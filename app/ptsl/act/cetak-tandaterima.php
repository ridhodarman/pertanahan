<?php
// membaca data dari form
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['id']), ENT_QUOTES)));
include '../inc/koneksi.php';
$query = "SELECT * FROM berkas_ptsl WHERE id=?";
$sql = $koneksi->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$data = $sql->get_result();
while ($row = $data->fetch_assoc()) {
  $nomor_berkas = $row['nomor_berkas'];
  $tahun = $row['tahun'];
  $nama_pemohon = strtoupper($row['nama_pemohon']);
  $nagari = strtoupper($row['desa_nagari']);
  //$kecamatan = $row['kecamatan'];
 }

function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

// $tanggal_surat_peng_fisik= tgl_indo($tanggal_surat_peng_fisik);
// $tanggal_surat_keterangan_wn= tgl_indo($tanggal_surat_keterangan_wn);
// $tanggal_lahir= tgl_indo($tanggal_lahir);
// $tanggal_pbb= tgl_indo(date("Y-m-d"));
// $ttahun_peristiwa = date('Y', strtotime($tanggal_peristiwa));

$tanggal= tgl_indo(date("Y-m-d"));
$no_hak = "                        ";
$no_pbt = "";

$document = file_get_contents("../format/tanda_terima.rtf");
// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("#nomor_berkas", $nomor_berkas, $document);
$document = str_replace("#tahun", $tahun, $document);
$document = str_replace("#nama_pemohon", $nama_pemohon, $document);
$document = str_replace("#nagari", $nagari, $document);
$document = str_replace("#tanggal", $tanggal, $document);
$document = str_replace("#no_hm", $no_hak, $document);
$document = str_replace("#no_pbt", $no_pbt, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=tanda_terima.doc");
header("Content-length: ".strlen($document));
echo $document;
?>