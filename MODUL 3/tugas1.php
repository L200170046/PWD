<html>
<head>
<title>tugas 1</title>
</head>
<body>
<form method ='POST' action='tugas1.php'>
<p>Nilai A adalah : <input type='text' name='nilaia' size='3'></p>
<p>Nilai B adalah : <input type='text' name='nilaib' size='3'></p>
<p><input type='submit' value='Jumlahkan' name='submit'></p>
</form>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$nilaia = $_POST ['nilaia'];
$nilaib = $_POST ['nilaib'];
$submit = $_POST['submit'];
$jumlah = $nilaia + $nilaib;
echo"Nilai A adalah $nilaia</br>";
echo"Nilai B adalah $nilaib</br>";
echo"Jadi Nilai A ditambah Nilai B adalah $jumlah";

?>
</body>
</html>
