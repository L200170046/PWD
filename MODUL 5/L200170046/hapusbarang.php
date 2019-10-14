<?php
	$conn = mysqli_connect ('localhost', 'root', '', 'penjualan');
	$kode = $_GET['nim'];
	$hapus = "DELETE FROM barang WHERE kode_barang='$kode'";
	$data = mysqli_query ($conn, $hapus);
	
	if ($data > 0) {
	    echo "
		<script>
		alert('Data berhasil dihapus');
		document.location.href = 'barang.php';
		</script>";
	}else{
	    echo "
		<script>
		alert('Data gagal dihapus');
		document.location.href = 'barang.php';
		</script>";
	}
?>