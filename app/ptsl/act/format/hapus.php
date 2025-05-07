<?php
include '../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['id2']), ENT_QUOTES)));
$query = "SELECT * FROM format_ptsl WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
	$file_ris = $row['risalah'];
	hapusfile($file_ris);
	$file_sk = $row['file_sk'];
	hapusfile($file_sk);
}

function hapusfile($namanya){
	$file="../../format/".$namanya;
	if ($file){
		if (!unlink($file))
		{
		echo ("gagal menghapus file $file");
		}
	}	
}

$query = "DELETE FROM format_ptsl WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);

if ($sql->execute()) {
	header("location:../../format-daftar.php?&sukses=Format $no_sk telah dihapus.");
}

?>