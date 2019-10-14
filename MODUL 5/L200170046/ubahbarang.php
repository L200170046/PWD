<?php
    $conn = mysqli_connect('localhost', 'root', '', 'penjualan');
    $kode = $_GET['nim'];
    $cari = "select * from barang where kode_barang='$kode'";
    $hasil_cari = mysqli_query ($conn, $cari);
    $data = mysqli_fetch_array ($hasil_cari);

    function active_radio_button ($value, $input){
        $result = $value == $input ? 'checked':'';
        return $result;
    }
    if ($data > 0){
       
	}
?>
<html>
<head>
<title>Data Penjualan</title>
</head>

<body>
<center>
<h3>Masukan Data Penjualan:<h3>
<table border='0' width='30%'>
<form method='POST' action='ubahbarang.php'>
<tr>
<td width='25%'>Kode Barang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name="kode_barang" size="10" value="<?php echo $data["kode_barang"]?>"></td>
</tr><tr>
<td width='25%'>Nama Barang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name="nama_barang" size="30" value="<?php echo $data["nama_barang"]?>"></td>
</tr>
<tr>
<td width='25%'>Kode Gudang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name="kode_gudang" size="40" value="<?php echo $data["kode_gudang"]?>"></td></tr>
</table>
<input type='submit' value='Masukkan' name='submit'>
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$kode = $_POST['kode_barang'];
$nama = $_POST['nama_barang'];
$kode2 = $_POST['kode_gudang'];
$submit = $_POST['submit'];
$update = "UPDATE barang SET kode_barang='$kode', nama_barang='$nama', kode_gudang='$kode2' WHERE kode_barang='$kode'";
if($submit){
    if($kode==''){
        echo "</br> Kode tidak boleh kosong, diisi dulu";
    }elseif($nama==''){
        echo "</br>Nama tidak boleh kosong, diisi dulu";
    }elseif($kode2==''){
        echo "</br>Kode gudang tidak boleh kosong, diisi dulu";
    }else{
        $data= mysqli_query($conn, $update);
        if ($data > 0) {
            echo "
            <script>
            alert('Data berhasil diubah');
            document.location.href ='barang.php';
            </script>";}
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
<td align='center' width='20%'><b>Kode Barang</b></td>
<td align='center' width='30%'><b>Nama Barang</b></td>
<td align='center' width='30%'><b>Kode Gudang</b></td>
<td align='center' width='30%'><b>Keterangan</b></td>
</tr>
<?php
    $cari = "select * from barang order by kode_barang";
    $hasil_cari = mysqli_query($conn, $cari);
    while($data = mysqli_fetch_row($hasil_cari)){
        echo"
        <tr>
        <td width='20%'>$data[0]</td>
        <td width='30%''>$data[1]</td>
        <td width='10%'>$data[2]</td>
        <td width='30%'><a href='ubahbarang.php?nim=".$data[0]."'>
        <input type='button' value='ubah' name='ubh'></a>
		<a href='hapusbarang.php?nim=".$data[0]."'>
        <input type='button' value='hapus' name='hps'></a></td>
        </tr>";
    }
    ?>
    </table></center></body></html>