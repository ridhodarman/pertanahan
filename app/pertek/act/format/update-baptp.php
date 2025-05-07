<?php
include '../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
//$file_baptp = $_POST['file_baptp'];
$no_sk = $_POST['no_sk'];
$no_sk = preg_replace("/[^a-zA-Z0-9]/", "", $no_sk);
$query = "SELECT ba_pembahasan_ptp  FROM format_pertek WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
  $file_baptp = $row['ba_pembahasan_ptp'];
}

$rand = rand(10,999);
$ekstensi =  array('rtf');
$filename = $_FILES['file_baptp']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:../../editformat.php?format=".$_POST['id']."&gagal=Gagal input data, File ba_pembahasan_ptp harus dalam format rtf");
}
else {
	$file="../../assets/format/".$file_baptp;
	if ($file){
		if (!unlink($file))
		{
		echo ("gagal menghapus file $file");
		}
	}

	$file_baptp = "_rapat pembahasan-ba___".$no_sk."___".$rand.'.rtf';
	move_uploaded_file($_FILES['file_baptp']['tmp_name'], '../../assets/format/'.$file_baptp);

	$query = "UPDATE format_pertek SET ba_pembahasan_ptp =? WHERE id=?";
	$sql = $koneksi->prepare($query);
	$sql->bind_param("ss", $file_baptp, $id);

	if ($sql->execute()) {
		header("location:../../editformat.php?format=".$_POST['id']."&alert=File ba_pembahasan_ptp berhasil di-upload");
	}
}