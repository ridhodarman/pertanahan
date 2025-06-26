<?php
include '../../../inc/koneksi.php';
$simpan = false;
 try {
	$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
	$id2 = $_POST['id'];
	$username = $_POST['username'];
	$keterangan = $_POST['keterangan'];

	$query = "UPDATE akun SET 
				username=?,
				keterangan=?
			WHERE id=?";
			$sql = $koneksi->prepare($query);
			$sql->bind_param(
				"ssi",
				$username,
				$keterangan,
				$id
			);
	if ($sql->execute()) {
		$simpan=true;
		echo '<script>alert("sukses ubah data")</script>';
		echo '<meta http-equiv="refresh" content="0;url=../akun-edit.php?id='.$id2.'">';
	}

} catch (exception $e) {
	echo "<b>gagal di proses, kendalayo:</b><br/>".mysqli_error($koneksi);	
	//header("location:../../../assets/error");
}
