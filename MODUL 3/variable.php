<html>
<head>
<title>variable</title>
</head>
<body>
<h1>buku tamu</h1>
<form method='POST' action='variable.php'>
<p>nama : <input type='text' name='nama' size='20'></p>
<p>email : <input type='text' name='email' size='30'></p>
<p>komentar : <textarea name='komentar' cols='30'
rows='3'></textarea></p>
<p><input type='submit' value='kirim' name='submit'></p>
</form>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$nama = $_POST['nama'];
$email = $_POST['email'];
$komentar = $_POST['komentar'];
$submit = $_POST['submit'];
if($submit) {
echo"</br>nama : $nama";
echo"</br>email : $email";
echo"</br>komentar : $komentar";
}
?>
</body>
</html>