<html>
<head>
<title>upload file</title>
</head>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$direktori='images/';
$nama_foto =$_FILES['foto'] ['name'];
$size_foto =$_FILES['foto'] ['size'];
$tipe_foto =$_FILES['foto'] ['type'];
$upload = $direktori.$nama_foto;
$submit = $_POST['submit'];

if($submit) {
move_uploaded_file($_FILES["foto"] ["tmp_name"],$upload);
echo"<h3>file berhasil di upload</h3>
</br></br>
<img border='0' src='$upload' height='200' widht='200'></br></br>
<b>informasi file :</b></br>
 nama file : $nama_foto </br>
 ukuran file : $size_foto byte </br>
 tipe file : $tipe_foto </br>";
 }else{
 ?>
 <form method='POST' enctype='multipart/form-data'
 action='upload.php'>
 upload file :<input type ='file' name='foto' size='20'></br>
 <input type ='submit' name='submit' value='upload'>
 </form>
 <?php
 }
 ?>
 </body>
 </html>