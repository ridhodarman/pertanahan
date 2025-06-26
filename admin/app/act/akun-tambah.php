<?php 
// koneksi database
if (isset($_POST['akunbaru'])) {
	session_start();
	include '../../../inc/koneksi.php';

	// try {
		// menangkap data yang di kirim dari form
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$keterangan = $_POST['keterangan'];

		if ($password!=$password2) {
			echo "<script>alert('konfirmasi password tidak sesuai');location='../akun-tambah.php';</script>";
		}

		$query = "insert into akun (username, password, keterangan) VALUES (?, ?, ?)";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("sss", $username, $password, $keterangan);

		if ($sql->execute()) {
	    	echo "<script>alert('Akun ".$username." berhasil dibuat');location='../akun-tambah.php';</script>";
		}
	// }
	// catch (exception $e) {
	// 	header("location:../assets/error");
	// }
}
else {
	header("location:../");
}
?>