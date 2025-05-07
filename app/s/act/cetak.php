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
  $nama_pemohon = $row['nama_pemohon'];
  $nik = $row['nik'];
  $tanggal_lahir = $row['tanggal_lahir'];
  $pekerjaan = $row['pekerjaan'];
  $nagari = $row['desa_nagari'];
  $jorong = $row['alamat'];
  $tanggal_pbb = $row['tanggal_pbb'];
  $tanggal_surat_peng_fisik = $row['tanggal_surat_peng_fisik'];
  $nomor_surat_keterangan_wn = $row['nomor_surat_keterangan_wn'];
  $tanggal_surat_keterangan_wn = $row['tanggal_surat_keterangan_wn'];
  $jenis_peristiwa = $row['jenis_peristiwa'];
  $tanggal_peristiwa = $row['tanggal_peristiwa'];
  $nib = $row['nib'];
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

$tanggal_surat_peng_fisik= tgl_indo($tanggal_surat_peng_fisik);
$tanggal_surat_keterangan_wn= tgl_indo($tanggal_surat_keterangan_wn);
$tanggal_lahir= tgl_indo($tanggal_lahir);
$tanggal_pbb= tgl_indo($tanggal_pbb);
$ttahun_peristiwa = date('Y', strtotime($tanggal_peristiwa));

$document = file_get_contents("../format/risalah.rtf");
// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("#nomor_berkas", $nomor_berkas, $document);
$document = str_replace("#tahun", $tahun, $document);
$document = str_replace("#nama_pemohon", $nama_pemohon, $document);
$document = str_replace("#nik", $nik, $document);
$document = str_replace("#tanggal_lahir", $tanggal_lahir, $document);
$document = str_replace("#pekerjaan", $pekerjaan, $document);
$document = str_replace("#nagari", $nagari, $document);
$document = str_replace("#jorong", $jorong, $document);
$document = str_replace("#tanggal_pbb", $tanggal_pbb, $document);
$document = str_replace("#tanggal_surat_peng_fisik", $tanggal_surat_peng_fisik, $document);
$document = str_replace("#nomor_surat_keterangan_wn", $nomor_surat_keterangan_wn, $document);
$document = str_replace("#tanggal_surat_keterangan_wn", $tanggal_surat_keterangan_wn, $document);
$document = str_replace("#jenis_peristiwa", $jenis_peristiwa, $document);
$document = str_replace("#ttahun_peristiwa", $ttahun_peristiwa, $document);
$document = str_replace("#nib", $nib, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=ris.doc");
header("Content-length: ".strlen($document));
echo $document;
?>