<?php
include '../../../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
//$file_ris = $_POST['file_ris'];
$no_sk = $_POST['no_sk'];
$no_sk = preg_replace("/[^a-zA-Z0-9]/", "", $no_sk);
$query = "SELECT risalah FROM format_pertek WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
  $file_ris2 = $row['risalah'];
}

$rand = rand(10,999);
$ekstensi =  array('rtf');
$filename = $_FILES['file_ris']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:../../editformat.php?format=".$_POST['id']."&gagal=Gagal input data, File risalah harus dalam format rtf");
}
else {
	$file="../../assets/format/".$file_ris2;
	if ($file){
		if (!unlink($file))
		{
		echo ("gagal menghapus file $file");
		//return "gagal";
		}
	}

	$file_ris = "_risalah".$no_sk."___".$rand.'.rtf';
	move_uploaded_file($_FILES['file_ris']['tmp_name'], '../../assets/format/'.$file_ris);

	$query = "UPDATE format_pertek SET risalah=? WHERE id=?";
	$sql = $koneksi->prepare($query);
	$sql->bind_param("ss", $file_ris, $id);

	if ($sql->execute()) {
		header("location:../../editformat.php?format=".$_POST['id']."&alert=File risalah berhasil di-upload");
	}
}