<?php
include '../../../inc/koneksi.php';
$simpan = false;
 try {
		$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['id']), ENT_QUOTES)));
		$query = "DELETE FROM akun WHERE id=?";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("i", $id);

		if ($sql->execute()) {
	    	echo '<script>alert("hapus akun berhasil")</script>';
			echo '<meta http-equiv="refresh" content="0;url=../akun-daftar.php">';
			
		}

} catch (exception $e) {
	echo "<b>gagal di proses, kendalayo:</b><br/>".mysqli_error($koneksi);	
	//header("location:../../../assets/error");
}
