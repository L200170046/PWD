<html>
<head>
<title>tugas2</title>
</head>
<body>
<h1>nilai</h1>
<form method ='POST' action='tugas2.php'>
<p>masukan nilai angka (0-100) : <input type='text' name='nilai' size='3'></p>
<p><input type='submit' value='proses' name='submit'></p>
</form>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$nilai = $_POST ['nilai'];
$submit = $_POST['submit'];

$angka=1 ; 
{ if($nilai % 2 == $angka++)
{$huruf= "Ganjil";
}else{
    $huruf= "Genap" ;}
echo"nilai angka adalah $nilai</br>";
echo"maka nilai huruf adalah $huruf";
}
?>
</body>
</html>