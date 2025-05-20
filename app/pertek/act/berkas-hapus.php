<?php 
// koneksi database
if (isset($_GET['id2'])) {
	include '../../../inc/koneksi.php';

	try {
		$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['id2']), ENT_QUOTES)));
		$query = "DELETE FROM berkas_pertek WHERE id=?";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("i", $id);

		if ($sql->execute()) {
	    	//echo "<script>alert('Data Berhasil Disimpan');location='index.php';</script>";
	    	header("location:../index.php?sukses=Berkas ".$_GET['berkas']." berhasil dihapus&berkas=");
			
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