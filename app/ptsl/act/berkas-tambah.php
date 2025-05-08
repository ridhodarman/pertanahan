<?php 
// koneksi database
if (isset($_POST['berkasbaru'])) {
	include '../inc/koneksi.php';

	// try {
		// menangkap data yang di kirim dari form
		$nomor_berkas = $_POST['nomor_berkas'];
		$tahun = $_POST['tahun'];
		$nama_pemohon = $_POST['nama_pemohon'];
		$nik = $_POST['nik'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$pekerjaan = $_POST['pekerjaan'];
		$nagari = $_POST['nagari'];
		$jorong = $_POST['jorong'];
		$tanggal_pbb = $_POST['tanggal_pbb'];
		$tanggal_surat_peng_fisik = $_POST['tanggal_surat_peng_fisik'];
		$nomor_surat_keterangan_wn = $_POST['nomor_surat_keterangan_wn'];
		$tanggal_surat_keterangan_wn = $_POST['tanggal_surat_keterangan_wn'];
		$jenis_peristiwa = $_POST['jenis_peristiwa'];
		$tanggal_peristiwa = $_POST['tanggal_peristiwa'];
		$nib = $_POST['nib'];
		$id_format = $_POST['id_format'];
		$akun_id = $_SESSION['user_id'];
		// $kecamatan = $_POST['kecamatan'];
		 
		// menginput data ke database
		// mysqli_query($koneksi,"insert into berkas (no_berkas, tahun, jenis_pertek, nama_pemohon, nik, alamat, bertindak_atas_nama, desa_nagari, kecamatan, tanggal_rapat_persiapan, jam_rapat_persiapan) values ($no_berkas, $tahun, '$jenis_pertek', '$nama_pemohon', '$nik', '$alamat', '$bertindak_atas_nama', '$nagari', '$kecamatan', '$tanggal_rapat_persiapan', '$jam_rapat_persiapan')");

		$query = "insert into berkas_ptsl (nomor_berkas, tahun, nama_pemohon, nik, tanggal_lahir, pekerjaan, desa_nagari, alamat, tanggal_pbb, tanggal_surat_peng_fisik, nomor_surat_keterangan_wn, tanggal_surat_keterangan_wn, jenis_peristiwa, tanggal_peristiwa, nib, id_format, akun_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$sql = $koneksi->prepare($query);
		$sql->bind_param("iissssssssssssss", $nomor_berkas, $tahun, $nama_pemohon, $nik, $tanggal_lahir, $pekerjaan, $nagari, $jorong, $tanggal_pbb, $tanggal_surat_peng_fisik, $nomor_surat_keterangan_wn, $tanggal_surat_keterangan_wn, $jenis_peristiwa, $tanggal_peristiwa, $nib, $id_format, $akun_id);

		if ($sql->execute()) {
	    	//echo "<script>alert('Data Berhasil Disimpan');location='index.php';</script>";
	    	header("location:../index.php?sukses=Berkas Nomor ".$nomor_berkas." berhasil dibuat");
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