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
if($Ubah){
    $update = " UPDATE buku set Kode_Buku='$kode_buku', Nama_Buku='$nama_buku', Kode_Jenis='$kode_jenis' WHERE Kode_Buku = '$kode_buku' ";
	mysqli_query($conn, $update);
	echo "<h3>Data Berhasil Diubah</h3>";
}
if ($_GET['ubh']) {
    $kode_buku = $_GET['ubh']; //NIM di dapat dari $_GET atau Link URL
    $cari = "SELECT * from buku where Kode_Buku='$kode_buku'";
    $hasil = mysqli_query($conn, $cari);
    $dataMahasiswa = mysqli_fetch_row($hasil); // Data mahasiswa yang akan diubah
}
?>
<body>
<center>
<h3> Masukkan Data Barang</h3>
<table border='0' width='30%'>
<form method='POST' action='edit.php'>
<tr>
<td width='25%'>Kode Buku</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='kode_buku' value="<?php echo $dataMahasiswa[0] ?>"></td>
</tr>
<tr>
<td width='25%'>Nama Buku</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='nama_buku' value="<?php echo $dataMahasiswa[1] ?>"></td>
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
    echo "<option value='$dataMahasiswa[2]'>$row[1]</option>";
}
?>
</select>
    </td>
</tr>
<tr>
<td></td>
<td></td>
<td>
<?php
// Cek apakah dataMahasiswa ada atau tidak
if ($dataMahasiswa) {
	echo "<input type='submit' name='Ubah' value='Ubah'>";
}
	?></td>
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