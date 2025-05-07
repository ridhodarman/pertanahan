<?php
function cetakberkas($namafile){
    include 'update-berkas.php';
    $document = file_get_contents("../assets/format/$namafile.rtf");
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
    else {
        header("location:../");
    }
} 
catch (exception $e) {
	header("location:../assets/error");
}
?>