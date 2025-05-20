<?php
include '../../../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
//$file_bapd = $_POST['file_bapd'];
$no_sk = $_POST['no_sk'];
$no_sk = preg_replace("/[^a-zA-Z0-9]/", "", $no_sk);
$query = "SELECT ba_pengolahan_data  FROM format_pertek WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
  $file_bapd = $row['ba_pengolahan_data'];
}

$rand = rand(10,999);
$ekstensi =  array('rtf');
$filename = $_FILES['file_bapd']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:../../editformat.php?format=".$_POST['id']."&gagal=Gagal input data, File berita acara pengolahan data harus dalam format rtf");
}
else {
	$file="../../assets/format/".$file_bapd;
	if ($file){
		if (!unlink($file))
		{
		echo ("gagal menghapus file $file");
		}
	}

	$file_bapd = "_pengolahan data-ba___".$no_sk."___".$rand.'.rtf';
	move_uploaded_file($_FILES['file_bapd']['tmp_name'], '../../assets/format/'.$file_bapd);

	$query = "UPDATE format_pertek SET ba_pengolahan_data =? WHERE id=?";
	$sql = $koneksi->prepare($query);
	$sql->bind_param("ss", $file_bapd, $id);

	if ($sql->execute()) {
		header("location:../../editformat.php?format=".$_POST['id']."&alert=File berita acara pengolahan data berhasil di-upload");
	}
}