<?php 
// koneksi database
if (isset($_GET['id'])) {
	include '../inc/koneksi.php';
	$berkas = $_GET['berkas'];
	try {
		$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['id']), ENT_QUOTES)));
		$query = "DELETE FROM berkas_ptsl WHERE id=?";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("i", $id);

		if ($sql->execute()) {
	    	//echo "<script>alert('Data Berhasil Disimpan');location='index.php';</script>";
	    	header("location:../index.php?sukses=Berkas No. ".$berkas." berhasil dihapus");
			
		}
	}
	catch (exception $e) {
		header("location:../assets/error");
	}
}
else {
	header("location:../");
}
?>