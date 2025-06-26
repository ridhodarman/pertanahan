<?php
include '../../../inc/koneksi.php';
$simpan = false;
 try {
	$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
	$id2 = $_POST['id'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if ($password!=$password2) {
		echo '<script>alert("konfirmasi password tidak sesuai");location="../akun-edit.php?id='.$id2.'";</script>';
	}

	else {
		$password3=md5($password);
		$query = "UPDATE akun SET 
				password=?
			WHERE id=?";
			$sql = $koneksi->prepare($query);
			$sql->bind_param(
				"si",
				$password3,
				$id
			);
		if ($sql->execute()) {
			$simpan=true;
			echo '<script>alert("sukses ganti password")</script>';
			echo '<meta http-equiv="refresh" content="0;url=../akun-edit.php?id='.$id2.'">';
		}
	}

} catch (exception $e) {
	echo "<b>gagal di proses, kendalayo:</b><br/>".mysqli_error($koneksi);	
	//header("location:../../../assets/error");
}
