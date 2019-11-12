<html>
<head><title>Data Barang</title></head>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$conn = mysqli_connect('localhost','root','','informatika');

$kode_buku=$_POST['kode_buku'];
$nama_buku=$_POST['nama_buku'];
$kode_jenis=$_POST['kode_jenis'];
$submit=$_POST['submit'];
$Ubah = $_POST['Ubah'];
if($submit){
    $input = " INSERT into buku(Kode_Buku,Nama_Buku,Kode_Jenis) values ('$kode_buku','$nama_buku','$kode_jenis')";
    mysqli_query($conn, $input);
    echo "<h3> Data berhasil dimasukkan</h3>";
}
if ($_GET['hps']) {
    $kode_buku = $_GET['hps']; //NIM di dapat dari $_GET atau Link URL
    $hapus = "DELETE from buku where Kode_Buku='$kode_buku'";
    mysqli_query($conn, $hapus);
    echo "<h3>Data berhasil di hapus</h3>";

// Ketika tombol ubah(di kolom aksi) di tekan
}
?>
<body>
<center>
<h3> Masukkan Data Barang</h3>
<table border='0' width='30%'>
<form method='POST' action='tugas.php'>
<tr>
<td width='25%'>Kode Buku</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='kode_buku' size='10'></td>
</tr>
<tr>
<td width='25%'>Nama Buku</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='nama_buku' size='30'></td>
</tr>
<tr>
<td width='25%'>Jenis Buku</td>
<td width='5%'>:</td>
<td width='65%'>
<select name="kode_jenis" >
<?php
$sql= "SELECT * FROM jenis_buku";
$retval=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_row($retval)){
    echo "<option value='$row[0]'>$row[1]</option>";
}
?>
</select>
    </td>
</tr>
<tr>
<td></td>
<td></td>
<td>


<input type='submit' name='submit' value='Submit'>

</table>
</form>


<hr>
<h3>Data Barang</h3>
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>Kode Buku</b></td>
<td align='center' width='30%'><b>Nama Buku</b></td>
<td align='center' width='10%'><b>Keterangan Jenis</b></td>
<td align='center' width='10%'><b>Aksi</b></td>
</tr>
<?php
$cari ="SELECT * from buku, jenis_buku where buku.kode_jenis = jenis_buku.kode_jenis";
$hasil_cari=mysqli_query($conn,$cari);
while($data=mysqli_fetch_row($hasil_cari)){
    echo "
    <tr>
    <td width='20%'>$data[0]</td>
    <td width='30%'>$data[1]</td>
    <td width='10%'>$data[2]</td>
    <td width='10%'><a href='edit.php?ubh=$data[0]'>Ubah</a>
    <a href='tugas.php?hps=$data[0]'>Hapus</a></td>
    </tr>";
}
?>
</table></center></body></html>