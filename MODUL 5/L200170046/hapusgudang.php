<?php
	$conn = mysqli_connect ('localhost', 'root', '', 'penjualan');
	$kode = $_GET['nim'];
	$hapus = "DELETE FROM gudang WHERE kode_gudang='$kode'";
	$data = mysqli_query ($conn, $hapus);
	
	if ($data > 0) {
	    echo "
		<script>
		alert('Data berhasil dihapus');
		document.location.href = 'gudang.php';
		</script>";
	}else{
	    echo "
		<script>
		alert('Data gagal dihapus');
		document.location.href = 'gudang.php';
		</script>";
	}
?>