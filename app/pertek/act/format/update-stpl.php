<?php
include '../../../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
//$file_stpl = $_POST['file_stpl'];
$no_sk = $_POST['no_sk'];
$no_sk = preg_replace("/[^a-zA-Z0-9]/", "", $no_sk);
$query = "SELECT st_pl  FROM format_pertek WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
  $file_stpl = $row['st_pl'];
}

$rand = rand(10,999);
$ekstensi =  array('rtf');
$filename = $_FILES['file_stpl']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:../../editformat.php?format=".$_POST['id']."&gagal=Gagal input data, File surat tugas pemeriksaan lapangan  harus dalam format rtf");
}
else {
	$file="../../assets/format/".$file_stpl;
	if ($file){
		if (!unlink($file))
		{
		echo ("gagal menghapus file $file");
		}
	}

	$file_stpl = "_peninjauan lapang-st___".$no_sk."___".$rand.'.rtf';
	move_uploaded_file($_FILES['file_stpl']['tmp_name'], '../../assets/format/'.$file_stpl);

	$query = "UPDATE format_pertek SET st_pl =? WHERE id=?";
	$sql = $koneksi->prepare($query);
	$sql->bind_param("ss", $file_stpl, $id);

	if ($sql->execute()) {
		header("location:../../editformat.php?format=".$_POST['id']."&alert=File surat tugas pemeriksaan lapangan  berhasil di-upload");
	}
}