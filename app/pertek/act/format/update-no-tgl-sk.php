<?php
include '../../inc/koneksi.php';
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
$no_sk = $_POST['no_sk'];
$tanggal_sk = $_POST['tanggal_sk'];

$query = "UPDATE format_pertek SET no_sk=?, tanggal_sk =? WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("sss", $no_sk, $tanggal_sk, $id);

if ($sql->execute()) {
	header("location:../../editformat.php?format=".$_POST['id']."&alert=Data SK berhasil di-update");
}