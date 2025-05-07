<?php
include '../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['id2']), ENT_QUOTES)));
$query = "SELECT * FROM format_pertek WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
	$file_bapd = $row['ba_pengolahan_data'];
	hapusfile($file_bapd);
	$file_bapl = $row['ba_pl'];
	hapusfile($file_bapl);
	$file_baptp = $row['ba_pembahasan_ptp'];
	hapusfile($file_baptp);
	$file_dhpd = $row['daftar_hadir_pengolahan_data'];
	hapusfile($file_dhpd);
	$file_dhptp = $row['daftar_hadir_pembahasan_ptp'];
	hapusfile($file_dhptp);
	$file_dhrp = $row['daftar_hadir_rapat_persiapan'];
	hapusfile($file_dhrp);
	$file_notulensi = $row['notulensi_rapat_persiapan'];
	hapusfile($file_notulensi);
	$file_ris = $row['risalah'];
	hapusfile($file_ris);
	$file_sk = $row['file_sk'];
	hapusfile($file_sk);
	$file_stpd = $row['st_pengolahan_data'];
	hapusfile($file_stpd);
	$file_stpl = $row['st_pl'];
	hapusfile($file_stpl);
	$file_suptp = $row['surat_undangan_pembahasan_ptp'];
	hapusfile($file_suptp);
	$file_surat = $row['surat_ptp'];
	hapusfile($file_surat);
	$file_surp = $row['surat_undangan_rapat_persiapan'];
	hapusfile($file_surp);
	$no_sk = $row['no_sk'];
}

function hapusfile($namanya){
	$file="../../assets/format/".$namanya;
	if ($file){
		if (!unlink($file))
		{
		echo ("gagal menghapus file $file");
		}
	}	
}

$query = "DELETE FROM format_pertek WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);

if ($sql->execute()) {
	header("location:../../daftarformat.php?&sukses=Format $no_sk telah dihapus.");
}

?>