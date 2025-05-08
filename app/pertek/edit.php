<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'inc/head.php'; ?>
</head>

<body>
  <?php include 'inc/header.php'; ?>

  <script type="text/javascript">
    <?php
    if (isset($_GET['sukses'])) {
      $pesan = $_GET['sukses'];
      echo '
      Swal.fire({
        title: "Success",
        text: "' . $pesan . '",
        icon: "success"
      });
      ';
    }
    ?>
  </script>

  <main id="main">
    <?php
    //include 'inc/koneksi.php';
//    require_once('inc/koneksi.php');
    $id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['berkas']), ENT_QUOTES)));

    $query = "SELECT * FROM berkas_pertek WHERE id=?";
    $sql = $koneksi->prepare($query);
    $sql->bind_param("i", $id);
    $sql->execute();
    $data = $sql->get_result();
    while ($row = $data->fetch_assoc()) {
      $no_berkas = $row['no_berkas'];
      $tahun = $row['tahun'];
      $jenis_pertek = $row['jenis_pertek'];
      $nama_pemohon = $row['nama_pemohon'];
      $nik = $row['nik'];
      $alamat = $row['alamat'];
      $bertindak_atas_nama = $row['bertindak_atas_nama'];
      $desa_nagari = $row['desa_nagari'];
      $kecamatan = $row['kecamatan'];
      $alamat_lokasi = $row['alamat_lokasi'];
      $tanggal_rapat_persiapan = $row['tanggal_rapat_persiapan'];
      $jam_rapat_persiapan = $row['jam_rapat_persiapan'];
      $luas = $row['luas'];
      $tanggal_permohonan = $row['tanggal_permohonan'];
      $tanggal_peninjauan = $row['tanggal_peninjauan'];
      $sampai_peninjauan = $row['sampai_peninjauan'];
      $no_stpl = $row['no_stpl'];
      $tanggal_stpl = $row['tanggal_stpl'];
      $koordinat_lokasi = $row['koordinat_lokasi'];
      $kawasan_rtrw = $row['kawasan_rtrw'];
      $penggunaan_tanah = $row['penggunaan_tanah'];
      $penguasaan_tanah = $row['penguasaan_tanah'];
      $indikasi_skp = $row['indikasi_skp'];
      $lereng = $row['lereng'];
      $tekstur = $row['tekstur'];
      $kedalaman_efektif = $row['kedalaman_efektif'];
      $drainase = $row['drainase'];
      $erosi = $row['erosi'];
      $faktor_pembatas = $row['faktor_pembatas'];
      $ketinggian = $row['ketinggian'];
      $mata_air = $row['mata_air'];
      $keberadaan_tanah_timbul = $row['keberadaan_tanah_timbul'];
      $pancang_diatas_air = $row['pancang_diatas_air'];
      $terletak_dipulau_kecil = $row['terletak_dipulau_kecil'];
      $nama_pulau = $row['nama_pulau'];
      $luas_pulau = $row['luas_pulau'];
      $kekerasan_tanah_timbul = $row['kekerasan_tanah_timbul'];
      $intrusi_air_laut = $row['intrusi_air_laut'];
      $jenis_tanah_timbul = $row['jenis_tanah_timbul'];
      $pola_pasang_surut = $row['pola_pasang_surut'];
      $arus_gel_laut = $row['arus_gel_laut'];
      $keberadaan_mangrove_dll = $row['keberadaan_mangrove_dll'];
      $jumlah_penduduk = $row['jumlah_penduduk'];
      $kepadatan_penduduk = $row['kepadatan_penduduk'];
      $rerata_kepemilikan_tanah = $row['rerata_kepemilikan_tanah'];
      $kepadatan_agraris = $row['kepadatan_agraris'];
      $mayoritas_mata_pencaharian = $row['mayoritas_mata_pencaharian'];
      $rencana_penggunaan_tanah = $row['rencana_penggunaan_tanah'];
      $jaringan_jalan = $row['jaringan_jalan'];
      $jaringan_listrik = $row['jaringan_listrik'];
      $air_minum = $row['air_minum'];
      $saluran_drainase = $row['saluran_drainase'];
      $pipa_minyak = $row['pipa_minyak'];
      $gas = $row['gas'];
      $longsor = $row['longsor'];
      $banjir_rob = $row['banjir_rob'];
      $banjir = $row['banjir'];
      $bencana_lainnya = $row['bencana_lainnya'];
      $keterangan_lain_lokasi = $row['keterangan_lain_lokasi'];
      $penggunaan_tanah_sekitar = $row['penggunaan_tanah_sekitar'];
      $keserasian = $row['keserasian'];
      $kesesuaian_karakteristik_tanah = $row['kesesuaian_karakteristik_tanah'];
      $utara = $row['utara'];
      $timur = $row['timur'];
      $selatan = $row['selatan'];
      $barat = $row['barat'];
      $jarak_jalan_penghubung = $row['jarak_jalan_penghubung'];
      $jarak_jalan_arteri = $row['jarak_jalan_arteri'];
      $penguasaan_tanah_sekitar = $row['penguasaan_tanah_sekitar'];
      $infrastruktur_berkaitan = $row['infrastruktur_berkaitan'];
      $jaringan_lainnya = $row['jaringan_lainnya'];
      $keterangan_lain_sekitar = $row['keterangan_lain_sekitar'];
      $nib = $row['nib'];
      $kbli = $row['kbli'];
      $no_ba_lapang = $row['no_ba_lapang'];
      $tanggal_ba_lapang = $row['tanggal_ba_lapang'];
      $no_st_pengolahan_data = $row['no_st_pengolahan_data'];
      $tanggal_st_pengolahan_data = $row['tanggal_st_pengolahan_data'];
      $no_ba_pengolahan_data = $row['no_ba_pengolahan_data'];
      $tanggal_ba_pengolahan_data = $row['tanggal_ba_pengolahan_data'];
      $no_ba_rapat_pembahasan = $row['no_ba_rapat_pembahasan'];
      $tanggal_rapat_pembahasan = $row['tanggal_rapat_pembahasan'];
      $luas_sesuai = $row['luas_sesuai'];
      $luas_bersyarat = $row['luas_bersyarat'];
      $luas_tidak_sesuai = $row['luas_tidak_sesuai'];
      $uraian_sesuai = $row['uraian_sesuai'];
      $alasan_bersyarat = $row['alasan_bersyarat'];
      $alasan_tidak_sesuai = $row['alasan_tidak_sesuai'];
      $no_risalah = $row['no_risalah'];
      $tanggal_risalah = $row['tanggal_risalah'];
      $no_surat_pertek = $row['no_surat_pertek'];
      $tanggal_surat_pertek = $row['tanggal_surat_pertek'];
      $id_format = $row['id_format'];
    }
    ?>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Berkas PTP No. <?php echo $no_berkas . " / " . $tahun ?></h2>
            <div><b><?php echo $nama_pemohon ?></b></div>
            <div><?php echo $bertindak_atas_nama ?></div>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Input Data</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

            <form action="act/cetak.php" method="post" role="form" class="php-email-form">
              <input type="hidden" name="id" value="<?php echo base64_encode($id) ?>">
              <div class="row">
                <div class="col-md-2 form-group">
                  <label>Nomor Berkas:</label>
                  <input type="text" name="no_berkas" class="form-control" placeholder="nomor berkasnyo" value="<?php echo $no_berkas ?>">
                </div>
                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label>Tahun:</label>
                  <input type="text" class="form-control" name="tahun" placeholder="tahun berkasnyo" value="<?php echo $tahun ?>">
                </div>
                <div class="col-md-8 form-group mt-3 mt-md-0">
                  <label>Jenis Pertek:</label>
                  <select name="jenis_pertek" class="form-control">
                    <?php
                    if (!empty($jenis_pertek)) {
                    ?>
                      <option value="<?php echo $jenis_pertek ?>"><?php echo $jenis_pertek ?></option>
                    <?php
                    } else {
                    ?>
                      <option value="" style="color: gray;">Pilih ciek.....</option>
                    <?php
                    }
                    ?>
                    <option value="" style="color: gray;">Pilih ciek.....</option>
                    <option value="Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha">
                      PKKPR Untuk Kegiatan Non Berusaha</option>
                    <option value="Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Berusaha">
                      PKKPR Untuk Kegiatan Berusaha</option>
                    <option value="Penyelenggaraan Kebijakan Penggunaan dan Pemanfaatan Tanah">Penyelenggaraan Kebijakan
                      Penggunaan dan Pemanfaatan Tanah</option>
                    <option value="PKKPR atau RKKPR Untuk Kegiatan Yang Bersifat Strategis Nasional">PKKPR atau RKKPR
                      Untuk Kegiatan Yang Bersifat Strategis Nasional</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Nama Pemohon:</label>
                  <input type="text" name="nama_pemohon" class="form-control" placeholder="namo pemohon" value="<?php echo $nama_pemohon ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>NIK:</label>
                  <input type="text" class="form-control" name="nik" placeholder="nik di KTP" value="<?php echo $nik ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Alamat:</label>
                  <input type="text" name="alamat" class="form-control" placeholder="alamat pemohon" value="<?php echo $alamat ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Bertindak atas nama:</label>
                  <input type="text" class="form-control" name="bertindak_atas_nama" value="<?php echo $bertindak_atas_nama ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Nagari:</label>
                  <input type="text" name="desa_nagari" class="form-control" placeholder="lokasi tanah di nagari.." value="<?php echo $desa_nagari ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Kecamatan:</label>
                  <input type="text" class="form-control" name="kecamatan" placeholder="lokasi tanah di kecamatan.." value="<?php echo $kecamatan ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Alamat lokasi (jalan/jorong/RT):</label>
                  <input type="text" name="alamat_lokasi" class="form-control" placeholder="lokasi tanah di nagari.." value="<?php echo $alamat_lokasi ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Format (SK Pertek):</label>
                  <select class="form-control" name="id_format">
                    <?php
                      $query = "SELECT id, no_sk, tanggal_sk FROM format_pertek 
                                WHERE id = ?";
                      $sql = $koneksi->prepare($query);
                      $sql->bind_param("i", $id_format);
                      $sql->execute();
                      $data = $sql->get_result();
                      if ($data->num_rows > 0) {
                        while ($row = $data->fetch_assoc()) {
                          $id = $row['id'];
                          $no_sk = $row['no_sk'];
                          $tanggal_sk = $row['tanggal_sk'];
                          if ($tanggal_sk==true && $tanggal_sk!="0000-00-00"){
                            $timestamp = strtotime($tanggal_sk);
                            $tanggal_sk = $new_date = date('d-m-Y', $timestamp);
                          }
                      ?>
                        <option value="<?php echo $id; ?>"><?php echo $no_sk; ?> tanggal <?php echo $tanggal_sk; ?></option>
                        <?php } 
                      }
                    ?>

                    <?php
                      $akun_id = $_SESSION['user_id'];
                      $query = "SELECT id, no_sk, tanggal_sk 
                                FROM format_pertek 
                                WHERE akun_id = ?
                                ORDER BY tanggal_sk DESC";
                      $sql = $koneksi->prepare($query);
                      $sql->bind_param("i", $akun_id);
                      $sql->execute();
                      $data = $sql->get_result();
                      if ($data->num_rows > 0) {
                        while ($row = $data->fetch_assoc()) {
                          $id = $row['id'];
                          $no_sk = $row['no_sk'];
                          $tanggal_sk = $row['tanggal_sk'];
                          if ($tanggal_sk==true && $tanggal_sk!="0000-00-00"){
                            $timestamp = strtotime($tanggal_sk);
                            $tanggal_sk = $new_date = date('d-m-Y', $timestamp);
                          }
                      ?>
                        <option value="<?php echo $id; ?>"><?php echo $no_sk; ?> tanggal <?php echo $tanggal_sk; ?></option>
                        <?php }
                      } else { ?>
                        <option value="null">Format tidak ada</option>
                      <?php } ?>
                    ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label id="persiapan">Tanggal Rapat Persiapan:</label>
                  <input type="date" name="tanggal_rapat_persiapan" class="form-control" id="name" value="<?php echo $tanggal_rapat_persiapan ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jam Rapat Persiapan (WIB):</label>
                  <input type="text" class="form-control" name="jam_rapat_persiapan" placeholder="masukkan waktu mulai rapat, misal= 10:00" value="<?php echo $jam_rapat_persiapan ?>">
                </div>
              </div>
              <div class="row">
                <!-- <br/>&nbsp;<br/> -->
                <button name="rapat-persiapan-und" type="kirim" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Surat Undangan Rapat Persiapan
                  <i class="fa fa-print"></i>
                </button>
                <br/>&nbsp;<br/>
                <button name="rapat-persiapan-dh" type="kirim" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Daftar Hadir Rapat Persiapan
                  <i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 5px;"></div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Luas:</label>
                  <input type="text" name="luas" class="form-control" placeholder="luas tanah yang dimohon.." value="<?php echo $luas ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Tanggal Permohonan:</label>
                  <input type="date" class="form-control" name="tanggal_permohonan" value="<?php echo $tanggal_permohonan ?>">
                </div>
              </div>
              <div class="row">
                <button name="rapat-persiapan-notulen" type="kirim" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Notulensi Rapat Persiapan
                  <i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 5px;"></div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>No. ST Lapang:</label>
                  <input type="text" name="no_stpl" class="form-control" value="<?php echo $no_stpl ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Tanggal ST Lapang:</label>
                  <input type="date" class="form-control" name="tanggal_stpl" value="<?php echo $tanggal_stpl ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Tanggal Peninjauan Lapang:</label>
                  <input type="date" class="form-control" name="tanggal_peninjauan" value="<?php echo $tanggal_peninjauan ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Peninjau Lapang sampai tanggal:</label>
                  <input type="date" name="sampai_peninjauan" class="form-control" value="<?php echo $sampai_peninjauan ?>">
                </div>
              </div>
              <div class="row">
                <button name="peninjauan-lapang-st" type="kirim" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Surat Tugas Lapang
                  <i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 5px;"></div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Koordinat Lokasi:</label>
                  <textarea class="form-control" name="koordinat_lokasi"><?php
                                                                          if (!empty($koordinat_lokasi)) {
                                                                            echo $koordinat_lokasi;
                                                                          } else {
                                                                            echo "-";
                                                                          }
                                                                          ?></textarea>
                </div>
                <div class="col-md-6 form-group">
                  <label>Arahan Fungsi Kawasan:</label>
                  <textarea class="form-control" name="kawasan_rtrw"><?php
                                                                      if (!empty($kawasan_rtrw)) {
                                                                        echo $kawasan_rtrw;
                                                                      } else {
                                                                        echo "-";
                                                                      }
                                                                      ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Penggunaan Tanah Saat ini:</label>
                  <input type="text" class="form-control" name="penggunaan_tanah" placeholder="penggunaan tanah saat ini" value="<?php echo $penggunaan_tanah ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Status penguasaan/pemilikan:</label>
                  <input type="text" name="penguasaan_tanah" class="form-control" placeholder="penguasaan/pemilikan tanah saat ini ?" value="<?php echo $penguasaan_tanah ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Indikasi Sengketa/konflik/perkara:</label>
                  <select class="form-control" name="indikasi_skp">
                    <?php
                    if (!empty($indikasi_skp)) {
                    ?>
                      <option value="<?php echo $indikasi_skp ?>"><?php echo $indikasi_skp ?></option>
                    <?php
                    }
                    ?>
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Ada">Ada</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label>Lereng:</label>
                  <input type="text" name="lereng" class="form-control" placeholder="misal: 0-3%, 3-8%, dst.." value="<?php echo $lereng ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Tekstur Tanah:</label>
                  <select class="form-control" name="tekstur">
                    <?php
                    if (!empty($tekstur)) {
                    ?>
                      <option value="<?php echo $tekstur ?>"><?php echo $tekstur ?></option>
                    <?php
                    }
                    ?>
                    <option value="Sedang">Sedang</option>
                    <option value="Halus">Halus</option>
                    <option value="Kasar">Kasar</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label>Kedalaman Efektif:</label>
                  <input type="text" name="kedalaman_efektif" class="form-control" placeholder="misal: >90 , 1-30, dll" value="<?php echo $kedalaman_efektif ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Drainase:</label>
                  <select class="form-control" name="drainase">
                    <?php
                    if (!empty($drainase)) {
                    ?>
                      <option value="<?php echo $drainase ?>"><?php echo $drainase ?></option>
                    <?php
                    }
                    ?>
                    <option value="Tidak tergenang">Tidak tergenang</option>
                    <option value="Tergenang periodik">Tergenang periodik</option>
                    <option value="Tergenang terus menerus">Tergenang terus menerus</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label name="erosi">Erosi:</label>
                  <select class="form-control" name="erosi">
                    <?php
                    if (!empty($erosi)) {
                    ?>
                      <option value="<?php echo $erosi ?>"><?php echo $erosi ?></option>
                    <?php
                    }
                    ?>
                    <option value="Tidak ada erosi">Tidak ada erosi</option>
                    <option value="Ada erosi">Ada erosi</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Faktor Pembatas:</label>
                  <select class="form-control" name="faktor_pembatas">
                    <?php
                    if (!empty($faktor_pembatas)) {
                    ?>
                      <option value="<?php echo $faktor_pembatas ?>"><?php echo $faktor_pembatas ?></option>
                    <?php
                    }
                    ?>
                    <option value="-">-</option>
                    <option value="Gambut">Gambut</option>
                    <option value="Tutupan batuan">Tutupan batuan</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label>Ketinggian (dalam satuan mdpl):</label>
                  <input type="text" name="ketinggian" class="form-control" placeholder="isi angko se, misalnyo: 100, 200, dll" value="<?php echo $ketinggian ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Keberadaan mata air:</label>
                  <select class="form-control" name="mata_air">
                    <?php
                    if (!empty($mata_air)) {
                    ?>
                      <option value="<?php echo $mata_air ?>"><?php echo $mata_air ?></option>
                    <?php
                    }
                    ?>
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Ada">Ada</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Keberadaan Tanah Timbul:</label>
                  <select class="form-control" name="keberadaan_tanah_timbul">
                    <?php
                    if (!empty($keberadaan_tanah_timbul)) {
                    ?>
                      <option value="<?php echo $keberadaan_tanah_timbul ?>"><?php echo $keberadaan_tanah_timbul ?>
                      </option>
                    <?php
                    }
                    ?>
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Ada">Ada</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Tiang Pancang di atas air:</label>
                  <select class="form-control" name="pancang_diatas_air">
                    <?php
                    if (!empty($pancang_diatas_air)) {
                    ?>
                      <option value="<?php echo $pancang_diatas_air ?>"><?php echo $pancang_diatas_air ?></option>
                    <?php
                    }
                    ?>
                    <option value="-">-</option>
                    <option value="Beton">Beton</option>
                    <option value="Besi">Besi</option>
                    <option value="Kayu">Kayu</option>
                    <option value="Bambu">Bambu</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Terletak di pulau kecil:</label>
                  <select class="form-control" name="terletak_dipulau_kecil">
                    <?php
                    if (!empty($terletak_dipulau_kecil)) {
                    ?>
                      <option value="<?php echo $terletak_dipulau_kecil ?>"><?php echo $terletak_dipulau_kecil ?></option>
                    <?php
                    }
                    ?>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Nama Pulau (khusus pulau kecil):</label>
                  <input type="text" class="form-control" name="nama_pulau" value='<?php
                                                                                    if (!empty($nama_pulau)) {
                                                                                      echo $nama_pulau;
                                                                                    } else {
                                                                                      echo "-";
                                                                                    } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Luas Pulau (khusus pulau kecil)</label>
                  <input type="text" name="luas_pulau" class="form-control" value='<?php
                                                                                    if (!empty($luas_pulau)) {
                                                                                      echo $luas_pulau;
                                                                                    } else {
                                                                                      echo "-";
                                                                                    } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Tingkat kekerasan tanah timbul:</label>
                  <input type="text" class="form-control" name="kekerasan_tanah_timbul" value='<?php
                                                                                                if (!empty($kekerasan_tanah_timbul)) {
                                                                                                  echo $kekerasan_tanah_timbul;
                                                                                                } else {
                                                                                                  echo "-";
                                                                                                } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Tingkat intrusi air laut</label>
                  <input type="text" name="intrusi_air_laut" class="form-control" value='<?php
                                                                                          if (!empty($intrusi_air_laut)) {
                                                                                            echo $intrusi_air_laut;
                                                                                          } else {
                                                                                            echo "-";
                                                                                          } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jenis tanah timbul:</label>
                  <input type="text" class="form-control" name="jenis_tanah_timbul" value='<?php
                                                                                            if (!empty($jenis_tanah_timbul)) {
                                                                                              echo $jenis_tanah_timbul;
                                                                                            } else {
                                                                                              echo "-";
                                                                                            } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Pola pasang surut</label>
                  <input type="text" name="pola_pasang_surut" class="form-control" value='<?php
                                                                                          if (!empty($pola_pasang_surut)) {
                                                                                            echo $pola_pasang_surut;
                                                                                          } else {
                                                                                            echo "-";
                                                                                          } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Arus dan gelombang laut:</label>
                  <input type="text" class="form-control" name="arus_gel_laut" value='<?php
                                                                                      if (!empty($arus_gel_laut)) {
                                                                                        echo $arus_gel_laut;
                                                                                      } else {
                                                                                        echo "-";
                                                                                      } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Keberadaan mangrove/padang lamun/terumbu karang:</label>
                  <input type="text" name="keberadaan_mangrove_dll" class="form-control" value='<?php
                                                                                                if (!empty($keberadaan_mangrove_dll)) {
                                                                                                  echo $keberadaan_mangrove_dll;
                                                                                                } else {
                                                                                                  echo "-";
                                                                                                } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jumlah penduduk:</label>
                  <input type="text" class="form-control" name="jumlah_penduduk" placeholder="misal 123 KK atau 1.000 jiwa, dll" value="<?php echo $jumlah_penduduk ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Kepadatan penduduk (jiwa/km2):</label>
                  <input type="text" name="kepadatan_penduduk" class="form-control" placeholder="isi angko se, misalnyo 1000, 2000, dsb." value="<?php echo $kepadatan_penduduk ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Rata-rata kepemilikan tanah (Ha/KK):</label>
                  <input type="text" name="rerata_kepemilikan_tanah" class="form-control" placeholder="isi angko se, misalnyo 1, 2, 3 dst." value='<?php
                                                                                                                                                    if (!empty($rerata_kepemilikan_tanah)) {
                                                                                                                                                      echo $rerata_kepemilikan_tanah;
                                                                                                                                                    } else {
                                                                                                                                                      echo "";
                                                                                                                                                    } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Kepadatan Agraris (jiwa/Ha):</label>
                  <input type="text" name="kepadatan_agraris" class="form-control" placeholder="isi angko se, misalnyo 100, 200, dsb." value='<?php
                                                                                                                                              if (!empty($kepadatan_penduduk)) {
                                                                                                                                                echo $kepadatan_penduduk;
                                                                                                                                              } else {
                                                                                                                                                echo "";
                                                                                                                                              } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Mayoritas mata pencaharian penduduk:</label>
                  <input type="text" name="mayoritas_mata_pencaharian" class="form-control" placeholder="misal: petani, pedagang, dll.." value="<?php echo $mayoritas_mata_pencaharian ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Rencana penggunaan tanah:</label>
                  <input type="text" class="form-control" name="rencana_penggunaan_tanah" placeholder="contoh: pabrik kelapa sawit, rumah tempat tinggal" value="<?php echo $rencana_penggunaan_tanah ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jaringan jalan:</label>
                  <select class="form-control" name="jaringan_jalan">
                    <?php
                    if (!empty($jaringan_jalan)) {
                    ?>
                      <option value="<?php echo $jaringan_jalan ?>"><?php echo $jaringan_jalan ?></option>
                    <?php
                    }
                    ?>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jaringan listrik:</label>
                  <select class="form-control" name="jaringan_listrik">
                    <?php
                    if (!empty($jaringan_listrik)) {
                    ?>
                      <option value="<?php echo $jaringan_listrik ?>"><?php echo $jaringan_listrik ?></option>
                    <?php
                    }
                    ?>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jaringan air minum:</label>
                  <select class="form-control" name="air_minum">
                    <?php
                    if (!empty($air_minum)) {
                    ?>
                      <option value="<?php echo $air_minum ?>"><?php echo $air_minum ?></option>
                    <?php
                    }
                    ?>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Saluran air/drainase:</label>
                  <select class="form-control" name="saluran_drainase">
                    <?php
                    if (!empty($saluran_drainase)) {
                    ?>
                      <option value="<?php echo $saluran_drainase ?>"><?php echo $saluran_drainase ?></option>
                    <?php
                    }
                    ?>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Saluran pipa minyak:</label>
                  <select class="form-control" name="pipa_minyak">
                    <?php
                    if (!empty($pipa_minyak)) {
                    ?>
                      <option value="<?php echo $pipa_minyak ?>"><?php echo $pipa_minyak ?></option>
                    <?php
                    }
                    ?>
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Ada">Ada</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Saluran gas:</label>
                  <select class="form-control" name="gas">
                    <?php
                    if (!empty($gas)) {
                    ?>
                      <option value="<?php echo $gas ?>"><?php echo $gas ?></option>
                    <?php
                    }
                    ?>
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Ada">Ada</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Longsor:</label>
                  <input type="text" class="form-control" name="longsor" value='<?php
                                                                                if (!empty($longsor)) {
                                                                                  echo $longsor;
                                                                                } else {
                                                                                  echo "-";
                                                                                } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Banjir rob:</label>
                  <input type="text" name="banjir_rob" class="form-control" value='<?php
                                                                                    if (!empty($banjir_rob)) {
                                                                                      echo $banjir_rob;
                                                                                    } else {
                                                                                      echo "-";
                                                                                    } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Banjir:</label>
                  <input type="text" class="form-control" name="banjir" value='<?php
                                                                                if (!empty($banjir)) {
                                                                                  echo $banjir;
                                                                                } else {
                                                                                  echo "-";
                                                                                } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Risiko bencana lainnya:</label>
                  <input type="text" name="bencana_lainnya" class="form-control" value='<?php
                                                                                        if (!empty($bencana_lainnya)) {
                                                                                          echo $bencana_lainnya;
                                                                                        } else {
                                                                                          echo "-";
                                                                                        } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Keterangan lain yang dianggap perlu (lokasi tanah yang dimohon):</label>
                  <textarea class="form-control" name="keterangan_lain_lokasi"><?php
                                                                                if (!empty($keterangan_lain_lokasi)) {
                                                                                  echo $keterangan_lain_lokasi;
                                                                                } else {
                                                                                  echo "-";
                                                                                }
                                                                                ?></textarea>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Penggunaan tanah disekitar lokasi:</label>
                  <textarea class="form-control" name="penggunaan_tanah_sekitar"><?php
                                                                                  if (!empty($penggunaan_tanah_sekitar)) {
                                                                                    echo $penggunaan_tanah_sekitar;
                                                                                  } else {
                                                                                    echo "-";
                                                                                  }
                                                                                  ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Utara (penggunaan tanah):</label>
                  <input type="text" class="form-control" name="utara" value="<?php echo $utara ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Timur (penggunaan tanah):</label>
                  <input type="text" name="timur" class="form-control" value="<?php echo $timur ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Selatan (penggunaan tanah):</label>
                  <input type="text" class="form-control" name="selatan" value="<?php echo $selatan ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Barat (penggunaan tanah):</label>
                  <input type="text" name="barat" class="form-control" value="<?php echo $barat ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jarak ke jalan penghubung: </label>
                  <input type="text" class="form-control" name="jarak_jalan_penghubung" placeholder="misal ± 500 meter dll" value="<?php echo $jarak_jalan_penghubung ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Jarak ke jalan arteri utama: </label>
                  <input type="text" name="jarak_jalan_arteri" class="form-control" placeholder="misal ± 1,2 km dll" value="<?php echo $jarak_jalan_arteri ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Gambaran umum penguasaan tanah sekitar:</label>
                  <textarea class="form-control" placeholder=".." name="penguasaan_tanah_sekitar"><?php
                                                                                                  if (!empty($penguasaan_tanah_sekitar)) {
                                                                                                    echo $penguasaan_tanah_sekitar;
                                                                                                  } else {
                                                                                                    echo "-";
                                                                                                  }
                                                                                                  ?></textarea>
                </div>
                <div class="col-md-6 form-group">
                  <label>Infrastruktur yang berkaitan dengan kegiatan pemohon ±:</label>
                  <textarea class="form-control" placeholder=".." name="infrastruktur_berkaitan"><?php
                                                                                                  if (!empty($infrastruktur_berkaitan)) {
                                                                                                    echo $infrastruktur_berkaitan;
                                                                                                  } else {
                                                                                                    echo "-";
                                                                                                  }
                                                                                                  ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Jaringan jalan, listrik, air, saluran, dll ±:</label>
                  <textarea class="form-control" placeholder=".." name="jaringan_lainnya"><?php
                                                                                          if (!empty($jaringan_lainnya)) {
                                                                                            echo $jaringan_lainnya;
                                                                                          } else {
                                                                                            echo "-";
                                                                                          }
                                                                                          ?></textarea>
                </div>
                <div class="col-md-6 form-group">
                  <label>Keterangan lain yang dianggap perlu (sekitar lokasi):</label>
                  <textarea class="form-control" placeholder=".." name="keterangan_lain_sekitar"><?php
                                                                                                  if (!empty($keterangan_lain_sekitar)) {
                                                                                                    echo $keterangan_lain_sekitar;
                                                                                                  } else {
                                                                                                    echo "-";
                                                                                                  }
                                                                                                  ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>NIB (Nomor Induk Berusaha):</label>
                  <input type="text" class="form-control" name="nib" placeholder="untuk pelaku usaha.." value="<?php echo $nib ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Kode dan nama KBLI:</label>
                  <input type="text" name="kbli" class="form-control" placeholder="Klasifikasi Baku Lapangan Usaha Indonesia" value="<?php echo $kbli ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>No. Berita Acara Pemeriksaan Lapang:</label>
                  <input type="text" class="form-control" name="no_ba_lapang" placeholder=".." value="<?php echo $no_ba_lapang ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Tanggal Berita Acara Pemeriksaan Lapang:</label>
                  <input type="date" name="tanggal_ba_lapang" class="form-control" value="<?php echo $tanggal_ba_lapang ?>">
                </div>
              </div>
              <div class="row">
                <button type="kirim" name="peninjauan-lapang-ba" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Berita Acara Pemeriksaan Lapang
                  <i class="fa fa-print"></i>
                </button>
                <br/>&nbsp;<br/>
                <button type="kirim" name="peninjauan-lapang-dokumentasi" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Format Dokumentasi Pemeriksaan Lapang
                  <i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 15px;"></div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <label>No. Surat Tugas Pengolahan Data:</label>
                  <input type="text" class="form-control" name="no_st_pengolahan_data" placeholder=".." value="<?php echo $no_st_pengolahan_data ?>">
                </div>
                <div class="col-md-4 form-group">
                  <label>Tanggal Surat Tugas Pengolahan Data:</label>
                  <input type="date" name="tanggal_st_pengolahan_data" class="form-control" value="<?php echo $tanggal_st_pengolahan_data ?>">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <label>No. BA Pengolahan Data:</label>
                  <input type="text" class="form-control" name="no_ba_pengolahan_data" placeholder=".." value="<?php echo $no_ba_pengolahan_data ?>">
                  <input type="hidden" name="tanggal_ba_pengolahan_data " class="form-control" value="<?php echo $tanggal_ba_pengolahan_data ?>">
                </div>
              </div>
              <div class="row">
                <button type="kirim" name="pengolahan-data-st" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Surat Tugas Pengolahan Data
                  <i class="fa fa-print"></i>
                </button>
                <br/>&nbsp;<br/>
                <button type="kirim" name="pengolahan-data-ba" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Berita Acara Rapat Pengolahan Data
                  <i class="fa fa-print"></i>
                </button>
                <br/>&nbsp;<br/>
                <button type="kirim" name="pengolahan-data-dh" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Daftar Hadir Rapat Pengolahan Data
                  <i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 15px;"></div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>No. BA Rapat Pembahasan PTP:</label>
                  <input type="text" class="form-control" name="no_ba_rapat_pembahasan" placeholder=".." value="<?php echo $no_ba_rapat_pembahasan ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Tanggal Rapat Pembahasan:</label>
                  <input type="date" name="tanggal_rapat_pembahasan" class="form-control" value="<?php echo $tanggal_rapat_pembahasan ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Keserasian dengan lingkungan sekitar:</label>
                  <input type="text" class="form-control" name="keserasian" value='<?php
                                                                                    if (!empty($keserasian)) {
                                                                                      echo $keserasian;
                                                                                    } else {
                                                                                      echo "-";
                                                                                    } ?>'>
                </div>
                <div class="col-md-6 form-group">
                  <label>Kesesuaian karakteristik tanah (Sesuai/Cukup Sesuai/Tidak Sesuai)</label>
                  <input type="text" name="kesesuaian_karakteristik_tanah" class="form-control" value='<?php
                                                                                                        if (!empty($kesesuaian_karakteristik_tanah)) {
                                                                                                          echo $kesesuaian_karakteristik_tanah;
                                                                                                        } else {
                                                                                                          echo "-";
                                                                                                        } ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <label>Luas Sesuai:</label>
                  <input type="text" class="form-control" name="luas_sesuai" placeholder=".." value="<?php echo $luas_sesuai ?>">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <label>Luas Tidak Sesuai:</label>
                  <input type="text" class="form-control" name="luas_tidak_sesuai" placeholder=".." value="<?php echo $luas_tidak_sesuai ?>">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <label>Luas Sesuai Bersyarat:</label>
                  <input type="text" class="form-control" name="luas_bersyarat" placeholder=".." value="<?php echo $luas_bersyarat ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <label>Uraian Sesuai ±:</label>
                  <textarea class="form-control" placeholder=".." name="uraian_sesuai"><?php
                                                                                        if (!empty($jaringan_lainnya)) {
                                                                                          echo $uraian_sesuai;
                                                                                        } else {
                                                                                          echo "-";
                                                                                        }
                                                                                        ?></textarea>
                </div>
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <label>Alasan Tidak Sesuai ±:</label>
                  <textarea class="form-control" placeholder=".." name="alasan_tidak_sesuai"><?php
                                                                                              if (!empty($jaringan_lainnya)) {
                                                                                                echo $alasan_tidak_sesuai;
                                                                                              } else {
                                                                                                echo "-";
                                                                                              }
                                                                                              ?></textarea>
                </div>
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <label>Alasan Sesuai Bersyarat ±:</label>
                  <textarea class="form-control" placeholder=".." name="alasan_bersyarat"><?php
                                                                                          if (!empty($jaringan_lainnya)) {
                                                                                            echo $alasan_bersyarat;
                                                                                          } else {
                                                                                            echo "-";
                                                                                          }
                                                                                          ?></textarea>
                </div>
              </div>
              <div class="row">
                <button type="kirim" name="rapat-pembahasan-und" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Undangan Rapat Pembahasan PTP
                  <i class="fa fa-print"></i>
                </button>
                <br/>&nbsp;<br/>
                <button type="kirim" name="rapat-pembahasan-ba" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Berita Acara Rapat Pembahasan PTP
                  <i class="fa fa-print"></i>
                </button>
                <br/>&nbsp;<br/>
                <button type="kirim" name="rapat-pembahasan-dh" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Daftar Hadir Rapat Pembahasan PTP
                  <i class="fa fa-print"></i>
                </button>
                <br/>&nbsp;<br/>
                <button type="kirim" name="rapat-pembahasan-dokumentasi" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Format Dokumentasi Rapat Pembahasan PTP
                  <i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 15px;"></div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>No. Risalah:</label>
                  <input type="text" class="form-control" name="no_risalah" placeholder=".." value="<?php echo $no_risalah ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Tanggal Risalah:</label>
                  <input type="date" name="tanggal_risalah" class="form-control" value="<?php echo $tanggal_risalah ?>">
                </div>
              </div>
              <div class="row">
                <br/>&nbsp;<br/>
                <button type="kirim" name="risalah" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>Print Risalah PTP<i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 15px;"></div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>No. Surat Keluar untuk Pertek:</label>
                  <input type="text" class="form-control" name="no_surat_pertek" placeholder=".." value="<?php echo $no_surat_pertek ?>">
                </div>
                <div class="col-md-6 form-group">
                  <label>Tanggal Surat:</label>
                  <input type="date" name="tanggal_surat_pertek" class="form-control" value="<?php echo $tanggal_surat_pertek ?>">
                </div>
              </div>
              <div class="row">
                <br/>&nbsp;<br/>
                <button type="kirim" name="surat-pertek" class="btn btn-secondary btn-lg btn-block btn-sm">
                  <i class="fa fa-save"></i>
                  Print Surat Keluar untuk Pertek
                  <i class="fa fa-print"></i>
                </button>
                <div style="padding-bottom: 15px;"></div>
              </div>
            <!-- </form> -->
            <div class="row">
              <div class="col-md-12 form-group mt-3 mt-md-0" style="text-align: center;">
                <div style="padding-top: 10px;"></div>
                <a href="index.php">
                  <button type="button" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i>
                      Kembali ke halaman awal
                  </button>
                </a>
                &emsp;
                <button type="kirim" name="simpan-data" class="btn btn-success">
                  <i class="fa fa-file"></i>
                  Simpan Perubahan Data
                </button>
              </div>
            </div>
            </form>
            <div class="row">
              <div class="col-md-12 form-group mt-3 mt-md-0">
                <button type="button" class="btn btn-outline-danger" onclick="hapus(123)">
                  <i class="fa fa-trash"></i>
                  Hapus
                </button>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <script type="text/javascript">
    function hapus() {
      Swal.fire({
        title: "Yakin hapus berkas ini?",
        text: "No. Berkas: <?php echo $no_berkas; ?>/<?php echo $tahun; ?> --- a.n. <?php echo $nama_pemohon; ?>",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#f0ad4e",
        confirmButtonText: '<a href="act/berkas-hapus.php?id2=<?php echo $_GET['berkas'] ?>&berkas=<?php echo $no_berkas; ?>/<?php echo $tahun; ?>" style="color: #ffffff">Hapus se</a>'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Please wait..",
            text: "sedang proses menghapus data berkas <?php echo $no_berkas; ?>/<?php echo $tahun; ?>...",
            icon: "success"
          }).then(function() {
            window.location = "act/berkas-hapus.php?id2=<?php echo $_GET['berkas'] ?>&berkas=<?php echo $no_berkas; ?>/<?php echo $tahun; ?>";
          });
        }
      });
    }
  </script>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Serenity</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies
              darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo.
              Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore
              legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Serenity</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>