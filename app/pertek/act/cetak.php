<?php
//include_once("../inc/koneksi.php");
function cetakberkas($namafile){
    include 'update-berkas.php';
    $id_format = null;
    $query = "SELECT id_format FROM berkas_pertek WHERE id=?";
    $sql = $koneksi->prepare($query);
    $sql->bind_param("i", $id);
    $sql->execute();
    $data = $sql->get_result();
    while ($row = $data->fetch_assoc()) {
      $id_format = $row['id_format'];
    }
    //echo $id_format;
    $namafile2 = null;
    if ($id_format){
        if ($namafile=="rapat persiapan-und"){
            $query = "SELECT surat_undangan_rapat_persiapan AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="rapat persiapan-dh"){
            $query = "SELECT daftar_hadir_rapat_persiapan AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="rapat persiapan-notulen"){
            $query = "SELECT notulensi_rapat_persiapan AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="peninjauan lapang-st"){
            $query = "SELECT st_pl AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="peninjauan lapang-ba"){
            $query = "SELECT ba_pl AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="pengolahan data-st"){
            $query = "SELECT st_pengolahan_data AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="pengolahan data-ba"){
            $query = "SELECT ba_pengolahan_data AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="pengolahan data-dh"){
            $query = "SELECT daftar_hadir_pengolahan_data AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="rapat pembahasan-und"){
            $query = "SELECT surat_undangan_pembahasan_ptp AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="rapat pembahasan-ba"){
            $query = "SELECT ba_pembahasan_ptp AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="rapat pembahasan-dh"){
            $query = "SELECT daftar_hadir_pembahasan_ptp AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="risalah"){
            $query = "SELECT risalah AS file FROM format_pertek WHERE id=?";
        }
        else if($namafile=="surat pertek"){
            $query = "SELECT surat_ptp AS file FROM format_pertek WHERE id=?";
        }
        $sql = $koneksi->prepare($query);
        $sql->bind_param("i", $id_format);
        $sql->execute();
        $data = $sql->get_result();
        while ($row = $data->fetch_assoc()) {
          $namafile2 = $row['file'];
        }
        //echo "<br/>";
        //echo $namafile;

        if ($namafile2) {
            $document = file_get_contents("../assets/format/$namafile2");    
        }
        else {
            $document = file_get_contents("../assets/format/$namafile.rtf");
        }
        
    }

    else {
        $document = file_get_contents("../assets/format/$namafile.rtf");
    }
    
    
    include '../inc/proses-word.php';
    header("Content-type: application/msword");
    $file=$no_berkas.$namafile;
    header("Content-disposition: inline; filename=$file.doc");
    header("Content-length: ".strlen($document));
    echo $document;
}

try {
    if (isset($_POST['rapat-persiapan-und'])) {
        cetakberkas("rapat persiapan-und");
    } 
    else if (isset($_POST['rapat-persiapan-dh'])) {
        cetakberkas("rapat persiapan-dh");
    }
    else if (isset($_POST['rapat-persiapan-notulen'])) {
        cetakberkas("rapat persiapan-notulen");
    }
    else if (isset($_POST['peninjauan-lapang-st'])) {
        cetakberkas("peninjauan lapang-st");
    }
    else if (isset($_POST['peninjauan-lapang-ba'])) {
        cetakberkas("peninjauan lapang-ba");
    }
    else if (isset($_POST['pengolahan-data-st'])) {
        cetakberkas("pengolahan data-st");
    }
    else if (isset($_POST['pengolahan-data-ba'])) {
        cetakberkas("pengolahan data-ba");
    }
    else if (isset($_POST['pengolahan-data-dh'])) {
        cetakberkas("pengolahan data-dh");
    }
    else if (isset($_POST['rapat-pembahasan-und'])) {
        cetakberkas("rapat pembahasan-und");
    }
    else if (isset($_POST['rapat-pembahasan-dh'])) {
        cetakberkas("rapat pembahasan-dh");
    }
    else if (isset($_POST['rapat-pembahasan-ba'])) {
        cetakberkas("rapat pembahasan-ba");
    }
    else if (isset($_POST['risalah'])) {
        cetakberkas("risalah");
    }
    else if (isset($_POST['surat-pertek'])) {
        cetakberkas("surat pertek");
    }
    else if (isset($_POST['peninjauan-lapang-dokumentasi'])) {
        cetakberkas("peninjauan lapang-dokumentasi");
    }
    else if (isset($_POST['rapat-pembahasan-dokumentasi'])) {
        cetakberkas("rapat pembahasan-dokumentasi");
    }
    else if (isset($_POST['simpan-data'])) {
        include 'update-berkas.php';
        if ($simpan==true) {
            header("location:../edit.php?berkas=".$_POST['id']."&sukses=perubahan data berhasil disimpan");
        }
    }
    else {
        header("location:../");
    }
} 
catch (exception $e) {
    header("location:../assets/error");
}
?>