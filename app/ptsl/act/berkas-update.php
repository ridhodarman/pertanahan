<?php
include '../../../inc/koneksi.php';
$simpan = false;
 try {
	$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
	$id2 = $_POST['id'];
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
	// $kecamatan = $_POST['kecamatan'];

	$query = "UPDATE berkas_ptsl SET 
				nomor_berkas=?,
				tahun=?,
				nama_pemohon=?,
				nik=?,
				tanggal_lahir=?,
				pekerjaan=?,
				desa_nagari=?,
				alamat=?,
				tanggal_pbb=?,
				tanggal_surat_peng_fisik=?,
				nomor_surat_keterangan_wn=?,
				tanggal_surat_keterangan_wn=?,
				jenis_peristiwa=?,
				tanggal_peristiwa=?,
				nib=?
			WHERE id=?";
			$sql = $koneksi->prepare($query);
			$sql->bind_param(
				"sssssssssssssssi",
				$nomor_berkas,
				$tahun,
				$nama_pemohon,
				$nik,
				$tanggal_lahir,
				$pekerjaan,
				$nagari,
				$jorong,
				$tanggal_pbb,
				$tanggal_surat_peng_fisik,
				$nomor_surat_keterangan_wn,
				$tanggal_surat_keterangan_wn,
				$jenis_peristiwa,
				$tanggal_peristiwa,
				$nib,
				$id
			);
	if ($sql->execute()) {
		$simpan=true;
		header("location:../berkas-edit.php?id=".$id2."&sukses=Berkas Nomor ".$nomor_berkas." berhasil dibuat");
	}

} catch (exception $e) {
	//echo "<b>gagal di proses, kendalayo:</b><br/>".mysqli_error($koneksi);	
	header("location:../assets/error");
}
