<?php 
// koneksi database
if (isset($_POST['baru'])) {
	include '../../../inc/koneksi.php';

	try {
		// menangkap data yang di kirim dari form
		$no_berkas = $_POST['no_berkas'];
		$tahun = $_POST['tahun'];
		$jenis_pertek = $_POST['jenis_pertek'];
		$nama_pemohon = $_POST['nama_pemohon'];
		$nik = $_POST['nik'];
		$alamat = $_POST['alamat'];
		$bertindak_atas_nama = $_POST['bertindak_atas_nama'];
		$nagari = $_POST['nagari'];
		$kecamatan = $_POST['kecamatan'];
		$id_format = $_POST['id_format'];
		$akun_id = $_SESSION['user_id'];
		 
		// menginput data ke database
		// mysqli_query($koneksi,"insert into berkas (no_berkas, tahun, jenis_pertek, nama_pemohon, nik, alamat, bertindak_atas_nama, desa_nagari, kecamatan, tanggal_rapat_persiapan, jam_rapat_persiapan) values ($no_berkas, $tahun, '$jenis_pertek', '$nama_pemohon', '$nik', '$alamat', '$bertindak_atas_nama', '$nagari', '$kecamatan', '$tanggal_rapat_persiapan', '$jam_rapat_persiapan')");

		$query = "insert into berkas_pertek (no_berkas, tahun, jenis_pertek, nama_pemohon, nik, alamat, bertindak_atas_nama, desa_nagari, kecamatan, id_format, akun_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("ssssssssss", $no_berkas, $tahun, $jenis_pertek, $nama_pemohon, $nik, $alamat, $bertindak_atas_nama, $nagari, $kecamatan, $id_format, $akun_id);

		if ($sql->execute()) {
	    	//echo "<script>alert('Data Berhasil Disimpan');location='index.php';</script>";
	    	header("location:../index.php?sukses=Berkas Nomor ".$no_berkas." berhasil dibuat");

	    	//$query = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'berkas'";
	    	$query = "SELECT max(id) FROM berkas_pertek";
			$sql = $koneksi->prepare($query);
			$sql->execute();
			$data = $sql->get_result();
			if ($data->num_rows > 0) {
				while ($row = $data->fetch_assoc()) {
				  //$id = $row['auto_increment'];
					$id = $row['max(id)'];
				}
				//$id=$id-1;

		    	$query = "SELECT * FROM berkas_pertek WHERE id=?";
				$sql = $koneksi->prepare($query);
				$sql->bind_param("i", $id);
				$sql->execute();
				$data = $sql->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
					  $id = $row['id'];
					  $no_berkas = $row['no_berkas'];
					  $tahun = $row['tahun'];
					  $nama_pemohon = $row['nama_pemohon'];
					  $nagari = $row['desa_nagari'];
					  $kecamatan = $row['kecamatan'];
			    	} 
			    	echo $nama_pemohon.$no_berkas.$tahun;
			    }
			    else {
		    	//echo "<script>alert('Error');window.history.go(-1);</script>";
		    	//echo $query;
				// mengalihkan halaman kembali ke index.php
				//echo "tidak ada error data berhasil di-update";
				//return 0;
				//header("location:../inputberkas.php#persiapan");
				}
			}
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
		header("location:../assets/error");
	}
}
else {
	header("location:../");
}
?>