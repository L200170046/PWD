<html>
<head><title>Data Penjualan</title></head>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'penjualan');
?>
<body>
<center>
<h3>Masukan Data Penjualan:<h3>
<table border='0' width='30%'>
<form method='POST' action='gudang.php'>
<tr>
<td width='25%'>Kode Gudang</td>
<td width='5%'>:</td>
<td width='65%'><input type='text'
name='kode_gudang' size='10'></td></tr>
<tr>
<td width='25%'>Nama Gudang</td>
<td width='5%'>:</td>
<td width='65%'><input type='text'
name='nama_gudang' size='30'></td></tr>
<tr>
<td width='25%'>Lokasi</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='lokasi' size='40'></td></tr>
</table>
<input type='submit' value='Masukkan' name='submit'>
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$kode = $_POST['kode_gudang'];
$nama = $_POST['nama_gudang'];
$alamat = $_POST['lokasi'];
$submit = $_POST['submit'];
$input = "insert into gudang (kode_gudang, nama_gudang, lokasi) values ('$kode', '$nama', '$alamat')";
if($submit){
    if($kode==''){
        echo "</br> Kode tidak boleh kosong, diisi dulu";
    }elseif($nama==''){
        echo "</br>Nama tidak boleh kosong, diisi dulu";
    }elseif($alamat==''){
        echo "</br>Lokasi tidak boleh kosong, diisi dulu";
    }else{
        mysqli_query($conn, $input);
        echo'</br> Data berhasil dimasukkan';
    }
}
?>
<hr>
<table>
<tr><td><h4><a href='gudang.php'> Gudang </a></td>
<td></h4><h4><a href='barang.php'> Barang </a></h4></td></tr>
</table>
<h3>Data Penjualan</h3>
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>Kode Gudang</b></td>
<td align='center' width='30%'><b>Nama Gudang</b></td>
<td align='center' width='30%'><b>Lokasi</b></td>
<td align='center' width='30%'><b>Keterangan</b></td>
</tr>
<?php
    $cari = "select * from gudang order by kode_gudang";
    $hasil_cari = mysqli_query($conn, $cari);
    while($data = mysqli_fetch_row($hasil_cari)){
        echo"
        <tr>
        <td width='20%'>$data[0]</td>
        <td width='30%''>$data[1]</td>
        <td width='10%'>$data[2]</td>
        <td width='30%'><a href='ubahgudang.php?nim=".$data[0]."'>
        <input type='button' value='ubah' name='ubh'></a>
		<a href='hapusgudang.php?nim=".$data[0]."'>
        <input type='button' value='hapus' name='hps'></a></td>
        </tr>";
    }
    ?>
    </table></center></body></html>