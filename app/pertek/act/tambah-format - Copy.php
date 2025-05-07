<?php 
// koneksi database
if (isset($_POST['baru'])) {
	include '../inc/koneksi.php';

	try {
		$no_sk = $_POST['no_sk'];
		// $tanggal_sk = $_POST['tanggal_sk'];
		// $surat_undangan_rapat_persiapan = $_POST['surat_undangan_rapat_persiapan'];
		// $notulensi_rapat_persiapan = $_POST['notulensi_rapat_persiapan'];
		// $daftar_hadir_rapat_persiapan = $_POST['daftar_hadir_rapat_persiapan'];
		// $st_pl = $_POST['st_pl'];
		// $ba_pl = $_POST['ba_pl'];
		// $st_pengolahan_data = $_POST['st_pengolahan_data'];
		// $ba_pengolahan_data = $_POST['ba_pengolahan_data'];
		// $daftar_hadir_pengolahan_data = $_POST['daftar_hadir_pengolahan_data'];
		// $surat_undangan_pembahasan_ptp = $_POST['surat_undangan_pembahasan_ptp'];
		// $ba_pembahasan_ptp = $_POST['ba_pembahasan_ptp'];
		// $daftar_hadir_pembahasan_ptp = $_POST['daftar_hadir_pembahasan_ptp'];
		// $risalah = $_POST['risalah'];
		// $surat_ptp = $_POST['surat_ptp'];
		
		$rand = rand();
		
		$ekstensi =  array('pdf');
		$filename = $_FILES['file_sk']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$ekstensi) ) {header("location:format.php?alert=Gagal input data, File SK harus dalam format pdf");}

		function cek_format($file) {
			if(isset($_POST[$file])) {
				$ekstensi =  array('rtf');
				$filename = $_FILES[$file]['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(!in_array($ext,$ekstensi) ) {header("location:format.php?alert=Gagal input data, Format file ".$file." harus dalam format .rtf");}
			}
		}

		cek_format("surat_undangan_rapat_persiapan");
		cek_format("notulensi_rapat_persiapan");
		cek_format("daftar_hadir_rapat_persiapan");
		cek_format("stpl");
		cek_format("ba_pl");
		cek_format("st_pengolahan_data");
		cek_format("ba_pengolahan_data");
		cek_format("daftar_hadir_pengolahan_data");
		cek_format("surat_undangan_pembahasan_ptp");
		cek_format("ba_pembahasan_ptp");
		cek_format("daftar_hadir_pembahasan_ptp");
		cek_format("risalah");
		cek_format("surat_ptp");

		$file_sk = "_SK___".$no_sk."___".$rand.'.pdf';
		move_uploaded_file($_FILES['file_sk']['tmp_name'], '../assets/format/'.$file_sk);
		$st_pl = "_STPL___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['st_pl']['tmp_name'], '../assets/format/'.$st_pl);
		$ba_pl = "_BAPL___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['ba_pl']['tmp_name'], '../assets/format/'.$ba_pl);
		$st_pengolahan_data = "_STpengolahanData___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['st_pengolahan_data']['tmp_name'], '../assets/format/'.$st_pengolahan_data);
		$ba_pengolahan_data = "_BApengolahanData___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['ba_pengolahan_data']['tmp_name'], '../assets/format/'.$ba_pengolahan_data);
		$daftar_hadir_pengolahan_data = "_DaftarHadirPengolahanData___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['daftar_hadir_pengolahan_data']['tmp_name'], '../assets/format/'.$daftar_hadir_pengolahan_data);
		$surat_undangan_pembahasan_ptp = "_SuratUndanganPembahasanPTP___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['surat_undangan_pembahasan_ptp']['tmp_name'], '../assets/format/'.$surat_undangan_pembahasan_ptp);
		$ba_pembahasan_ptp = "_BApembahasanPTP___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['ba_pembahasan_ptp']['tmp_name'], '../assets/format/'.$ba_pembahasan_ptp);
		$daftar_hadir_pembahasan_ptp = "_DaftarHadirPembahasanPTP___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['daftar_hadir_pembahasan_ptp']['tmp_name'], '../assets/format/'.$daftar_hadir_pembahasan_ptp);
		$risalah = "_risalah___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['risalah']['tmp_name'], '../assets/format/'.$risalah);
		$surat_ptp = "_suratPTP___".$no_sk."___".$rand.'.rtf';
		move_uploaded_file($_FILES['surat_ptp']['tmp_name'], '../assets/format/'.$surat_ptp);

		$query = "insert into format (no_sk, tanggal_sk, file_sk,
					surat_undangan_rapat_persiapan, notulensi_rapat_persiapan, daftar_hadir_rapat_persiapan, 
					st_pl , ba_pl, st_pengolahan_data, ba_pengolahan_data, daftar_hadir_pengolahan_data,
					surat_undangan_pembahasan_ptp, ba_pembahasan_ptp, daftar_hadir_pembahasan_ptp,
					risalah, surat_ptp) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("ssssssssssssssss", $no_sk, $tanggal_sk, $file_sk,
						$surat_undangan_rapat_persiapan, $notulensi_rapat_persiapan, $daftar_hadir_rapat_persiapan,
						$st_pl , $ba_pl, $st_pengolahan_data, $ba_pengolahan_data, $daftar_hadir_pengolahan_data,
						$surat_undangan_pembahasan_ptp, $ba_pembahasan_ptp, $daftar_hadir_pembahasan_ptp,
						$risalah, $surat_ptp
				);

		if ($sql->execute()) {
	    	echo "<script>alert('Data Berhasil Disimpan');location='../inputformat.php';</script>";
	    	//header("location:../format.php?sukses=Format SK No. ".$no_sk." berhasil dibuat");
		}
	}
	catch (exception $e) {
		// Cek koneksi
		// if (mysqli_connect_errno()){
		// echo "gagal diproses, kendalanyo:<br/>" . mysqli_connect_error();
		// }
		// else {
		// 	echo "ado error, caliak data yang di input lu";
		// }
		echo $e;
		//header("location:../assets/error");
	}
}
else {
	header("location:../");
}
?>