<?php
include '../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
$no_sk = $_POST['no_sk'];
$no_sk2 = preg_replace("/[^a-zA-Z0-9]/", "", $no_sk);
$query = "SELECT file_sk FROM format_pertek WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
  $file_sk = $row['file_sk'];
}

$rand = rand(10,999);
$ekstensi =  array('pdf');
$filename = $_FILES['file_sk']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$ekstensi) ) {
	header("location:../../editformat.php?format=".$_POST['id']."&gagal=Gagal input data, File SK harus dalam format pdf");
}
else {
	$file="../../assets/format/".$file_sk;
	if ($file){
		if (!unlink($file))
		{
		echo ("gagal menghapus file $file");
		}
	}

	$file_sk = "_SK___".$no_sk2."___".$rand.'.pdf';
	move_uploaded_file($_FILES['file_sk']['tmp_name'], '../../assets/format/'.$file_sk);

	$query = "UPDATE format_pertek SET file_sk=? WHERE id=?";
	$sql = $koneksi->prepare($query);
	$sql->bind_param("ss", $file_sk, $id);

	if ($sql->execute()) {
		header("location:../../editformat.php?format=".$_POST['id']."&alert=File SK berhasil di-upload");
	}
}