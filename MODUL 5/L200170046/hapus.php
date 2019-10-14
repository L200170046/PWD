<?php
	$conn = mysqli_connect ('localhost', 'root', '', 'Informatika');
	$nim = $_GET['nim'];
	$hapus = "DELETE FROM mahasiswa WHERE nim='$nim'";
	$data = mysqli_query ($conn, $hapus);
	
	if ($data > 0) {
	    echo "
		<script>
		alert('Data berhasil dihapus');
		document.location.href ='form.php';
		</script>";
	}else{
	    echo "
		<script>
		alert('Data gagal dihapus');
		document.location.href='form.php';
		</script>";
	}
?>