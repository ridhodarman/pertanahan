<?php 
// koneksi database
if (isset($_POST['berkasbaru'])) {
	include '../../../inc/koneksi.php';
	session_start();

	// try {
		// menangkap data yang di kirim dari form
		$no_sk = $_POST['no_sk'];
		$tanggal_sk = $_POST['tanggal_sk'];
		$akun_id=$_SESSION['user_id'];
		
		$filename1 = $_FILES['file_sk']['name'];
		$ekstensi1 =  array('pdf');
		$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
		if(!in_array($ext1,$ekstensi1) ) {
			header("location:daftarformat.php?alert=Gagal input data, File SK harus dalam format pdf");
		}

		$filename2 = $_FILES['file_risalah']['name'];
		$ekstensi2 =  array('rtf');
		$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
		if(!in_array($ext2,$ekstensi2) ) {
			header("location:daftarformat.php?alert=Gagal input data, File risalah harus dalam format rtf");
		}

		$no_sk2 = preg_replace("/[^a-zA-Z0-9]/", "", $no_sk);
		$rand = rand(10,999);
		$file_sk = "_SK___".$no_sk2."___".$rand.'.pdf';
		move_uploaded_file($_FILES['file_sk']['tmp_name'], '../format/'.$file_sk);

		$rand = rand(10,999);
		$file_risalah = "_Risalah___".$no_sk2."___".$rand.'.rtf';
		move_uploaded_file($_FILES['file_sk']['tmp_name'], '../format/'.$file_risalah);
		
		$query = "insert into format_ptsl (no_sk, tanggal_sk, file_sk, risalah, akun_id) VALUES (?, ?, ?, ?, ?)";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("sssss", $no_sk, $tanggal_sk, $file_sk, $file_risalah, $akun_id);

		if ($sql->execute()) {
	    	//echo "<script>alert('Data Berhasil Disimpan');location='index.php';</script>";
	    	header("location:../format.php?sukses=Format ".$no_sk." berhasil dibuat");
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