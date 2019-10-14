<?php
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');
    $nim = $_GET['nim'];
    $cari = "select * from mahasiswa where nim='$nim'";
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
<title>Data Mahasiswa</title>
</head>

<body>
<center>
<h3>Masukan Data Mahasiswa:<h3>
<table border='0' width='30%'>
<form method='POST' action='ubah.php'>
<tr>
<td width='25%'>NIM</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name="nim" size="10" value="<?php echo $data["NIM"]?>"></td>
</tr>
<td width='25%'>Nama</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name="nama" size="30" value="<?php echo $data["Nama"]?>"></td>
</tr>
<td width='25%'>Kelas</td>
<td width='5%'>:</td>
<td width='65%'><input type="radio" name="kelas" value="A" <?php echo active_radio_button("A", $data["Kelas"])?> >A
				<input type="radio" name="kelas" value="B" <?php echo active_radio_button("B", $data["Kelas"])?> >B
				<input type="radio" name="kelas" value="C" <?php echo active_radio_button("C", $data["Kelas"])?> >C
				</td></tr>
<td width='25%'>Alamat</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name="alamat" size="40" value="<?php echo $data["Alamat"]?>"></td></tr>
</table>
<input type='submit' value='Masukkan' name='submit'>
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$submit = $_POST['submit'];
$update = "UPDATE mahasiswa SET nim='$nim', nama='$nama', kelas='$kelas', alamat='$alamat' WHERE nim='$nim'"; 
if($submit){
    if($nim==''){
        echo "</br> NIM tidak boleh kosong, diisi dulu";
    }elseif($nama==''){
        echo "</br>Nama tidak boleh kosong, diisi dulu";
    }elseif($kelas==''){
        echo "</br>Kelas tidak boleh kosong, diisi dulu";
    }elseif($alamat==''){
        echo "</br>Alamat tidak boleh kosong, diisi dulu";
    }else{
        $data= mysqli_query($conn, $update);
        if ($data > 0) {
            echo "
            <script>
            alert('Data berhasil diubah');
            document.location.href ='form.php';
            </script>";}
    }
}
?>
<hr>
<h3>Data Mahasiswa</h3>
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>NIM</b></td>
<td align='center' width='30%'><b>Nama</b></td>
<td align='center' width='10%'><b>Kelas</b></td>
<td align='center' width='30%'><b>Alamat</b></td>
<td align='center' width='30%'><b>Keterangan</b></td>
</tr>
<?php
    $cari = "select * from mahasiswa order by nim";
    $hasil_cari = mysqli_query($conn, $cari);
    while($data=mysqli_fetch_row($hasil_cari)){
        echo"
        <tr>
        <td width='20%'>$data[0]</td>
        <td width='30%''>$data[1]</td>
        <td width='10%'>$data[2]</td>
        <td width='30%'>$data[3]</td>
        <td width='30%'><a href='ubah.php?nim=".$data[0]."'>
        <input type='button' value='ubah' name='ubh'></a>
		<a href='hapus.php?nim=".$data[0]."'>
        <input type='button' value='hapus' name='hps'></a></td>
        </tr>";
    }
    ?>
    </table></center></body></html>