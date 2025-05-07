<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'inc/head.php'; ?>
</head>

<body>
  <?php
  include 'inc/koneksi.php';
  $id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['format']), ENT_QUOTES)));

  $query = "SELECT * FROM format_pertek WHERE id=?";
  $sql = $koneksi->prepare($query);
  $sql->bind_param("i", $id);
  $sql->execute();
  $data = $sql->get_result();
  while ($row = $data->fetch_assoc()) {
    $no_sk = $row['no_sk'];
    $tanggal_sk = $row['tanggal_sk'];
    $file_sk = $row['file_sk'];
    $surat_undangan_rapat_persiapan = $row['surat_undangan_rapat_persiapan'];
    $notulensi_rapat_persiapan = $row['notulensi_rapat_persiapan'];
    $daftar_hadir_rapat_persiapan = $row['daftar_hadir_rapat_persiapan'];
    $st_pl = $row['st_pl'];
    $ba_pl = $row['ba_pl'];
    $st_pengolahan_data = $row['st_pengolahan_data'];
    $ba_pengolahan_data = $row['ba_pengolahan_data'];
    $daftar_hadir_pengolahan_data = $row['daftar_hadir_pengolahan_data'];
    $surat_undangan_pembahasan_ptp = $row['surat_undangan_pembahasan_ptp'];
    $ba_pembahasan_ptp = $row['ba_pembahasan_ptp'];
    $daftar_hadir_pembahasan_ptp = $row['daftar_hadir_pembahasan_ptp'];
    $risalah = $row['risalah'];
    $surat_ptp = $row['surat_ptp'];
  }

  ?>

  <?php include 'inc/header.php'; ?>

  <script type="text/javascript">
    <?php
    if (isset($_GET['alert'])) {
      $pesan = $_GET['alert'];
      echo '
      Swal.fire({
        title: "Success",
        text: "' . $pesan . '",
        icon: "success"
      });
      ';
    }

    if (isset($_GET['gagal'])) {
      $pesan = $_GET['gagal'];
      echo '
      Swal.fire({
        title: "Gagal",
        text: "' . $pesan . '",
        icon: "error"
      });
      ';
    } 
    ?>
  </script>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Edit Format</h2>
            <p>Pertimbangan Teknis Pertanahan Kabupaten Agam</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Edit Format</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">
            <div class="row">
              <div class="col-md-6 form-group">
                <table class="table">
                  <tr>
                    <td>Nomor SK</td>
                    <td>:</td>
                    <td><?php echo $no_sk; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal SK</td>
                    <td>:</td>
                    <td><?php echo date("d-M-Y", strtotime($tanggal_sk)); ?></td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6 form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSK">
                  Edit Data SK
                </button>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalSK" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
              aria-hidden="true" data-backdrop="false">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="act/format/update-no-tgl-sk.php" method="post" role="form" class="php-email-form"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                      <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                      <div>
                        <label>Nomor SK:</label>
                        <input type="text" name="no_sk" class="form-control" id="no_sk" placeholder="nomor SK Pertek"
                          value="<?php echo $no_sk; ?>">
                      </div>
                      <div class="mt-3">
                        <label>Tanggal SK:</label>
                        <input type="date" class="form-control" name="tanggal_sk" value="<?php echo $tanggal_sk; ?>">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button name="kirim" type="submit" class="btn btn-primary">Simpan Perubahan Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label> File Surat Keputusan (SK): </label>
              <?php
                if ($file_sk) {
              ?> <a target="_blank" href="assets/format/<?php echo $file_sk; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh SK</button>
              </a>
              <?php
                } else {
                  ?> <font color="red">file SK belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modal-fileSK">Upload
                File SK</button>
              <!-- Modal -->
              <div class="modal fade" id="modal-fileSK" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload SK</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-SK.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>File SK</label>
                          <p><small>upload dalam format *.pdf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_sk" />
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan SK</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Surat Undangan Rapat Persiapan:</label>
              <?php
                if ($surat_undangan_rapat_persiapan) {
              ?>
              <a href="assets/format/<?php echo $surat_undangan_rapat_persiapan; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalSURP">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalSURP" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-surp.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Surat Undangan Rapat Persiapan</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_surp">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Notulensi Rapat Persiapan:</label>
              <?php
                if ($notulensi_rapat_persiapan) {
              ?>
              <a href="assets/format/<?php echo $notulensi_rapat_persiapan; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalNotulensi">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalNotulensi" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-notulensi.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Notulensi Rapat Persiapan</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_notulensi">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 form-group">
              <label>Format Daftar Hadir Rapat Persiapan:</label>
              <?php
                if ($daftar_hadir_rapat_persiapan) {
              ?>
              <a href="assets/format/<?php echo $daftar_hadir_rapat_persiapan; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalDHRP">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalDHRP" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-dhrp.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Daftar Hadir Rapat Persiapan</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_dhrp">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Surat Tugas Pemeriksaan Lapangan:</label>
              <?php
                if ($st_pl) {
              ?>
              <a href="assets/format/<?php echo $st_pl; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalst_pl">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalst_pl" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-stpl.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Surat Tugas Pemeriksaan Lapangan</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_stpl">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Berita Acara Pemeriksaan Lapang:</label>
              <?php
                if ($ba_pl) {
              ?>
              <a href="assets/format/<?php echo $ba_pl; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalba_pl">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalba_pl" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-bapl.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Berita Acara Pemeriksaan Lapangan</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_bapl">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Surat Tugas Pengolahan Data:</label>
              <?php
                if ($st_pengolahan_data) {
              ?>
              <a href="assets/format/<?php echo $st_pengolahan_data; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalstpd">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalstpd" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-stpd.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Surat Tugas Pengolahan Data</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_stpd">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Berita Acara Pengolahan Data:</label>
              <?php
                if ($ba_pengolahan_data) {
              ?>
              <a href="assets/format/<?php echo $ba_pengolahan_data; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalbapd">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalbapd" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-bapd.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Berita Acara Pengolahan Data</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_bapd">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Daftar Hadir Pengolahan Data:</label>
              <?php
                if ($daftar_hadir_pengolahan_data) {
              ?>
              <a href="assets/format/<?php echo $daftar_hadir_pengolahan_data; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modaldhpd">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modaldhpd" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-dhpd.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Daftar Hadir Pengolahan Data</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_dhpd">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Surat Undangan Pembahasan PTP:</label>
              <?php
                if ($surat_undangan_pembahasan_ptp) {
              ?>
              <a href="assets/format/<?php echo $surat_undangan_pembahasan_ptp; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalsuptp">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalsuptp" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-suptp.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Surat Undangan Pembahasan PTP</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_suptp">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Berita Acara Pembahasan PTP:</label>
              <?php
                if ($ba_pembahasan_ptp) {
              ?>
              <a href="assets/format/<?php echo $ba_pembahasan_ptp; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalbaptp">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalbaptp" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-baptp.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Berita Acara Pembahasan PTP</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_baptp">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Daftar Hadir Rapat Pembahasan PTP:</label>
              <?php
                if ($daftar_hadir_pembahasan_ptp) {
              ?>
              <a href="assets/format/<?php echo $daftar_hadir_pembahasan_ptp; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modaldhptp">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modaldhptp" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-dhptp.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Daftar Hadir Rapat Pembahasan PTP</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_dhptp">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Risalah PTP:</label>
              <?php
                if ($risalah) {
              ?>
              <a href="assets/format/<?php echo $risalah; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalris">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalris" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-risalah.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Risalah PTP</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_ris">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 form-group">
              <label>Format Surat PTP:</label>
              <?php
                if ($surat_ptp) {
              ?>
              <a href="assets/format/<?php echo $surat_ptp; ?>">
                <button type="button" class="btn-sm btn-secondary">Unduh Format</button>
              </a>
              <?php
                } else {
              ?>
              <font color="red">format belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalsurat">Upload
                Format Baru</button>
              <!-- Modal -->
              <div class="modal fade" id="modalsurat" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Upload Format</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="act/format/update-surat.php" method="post" role="form" class="php-email-form"
                      enctype="multipart/form-data">
                      <div class="modal-body">
                        <div>
                          <input type="hidden" name="id" value="<?php echo (base64_encode($id)); ?>" />
                          <input type="hidden" name="no_sk" value="<?php echo $no_sk; ?>" />
                          <label>Format Surat PTP</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_surat">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="kirim" type="submit" class="btn btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>



          </div> <!--tutup div untuk fade left!-->
          
        </div> <!-- tutup div row mt 5 -->
      </div>






      <div class="row mt-5">

        
      </div>

      <div class="row mt-5">
        <div style="padding-top: 15px;"></div>
        <!-- <div style="padding-top: 5px;"></div> -->
        <button name="baru" type="submit" class="btn btn-success btn-lg btn-block">
          <i class="fa fa-save"></i>
          Simpan Format
        </button>
      </div>
      </form>


      <div class="row mt-5">
        <div style="padding-top: 15px;"></div>
        <!-- <div style="padding-top: 5px;"></div> -->
        <button name="baru" type="submit" class="btn btn-danger btn-lg" onclick="hapus(123)">
          &emsp;
          <i class="fa fa-trash"></i>
          &emsp;
          Hapus Format
        </button>
      </div>


      </div>

      </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'inc/footer.php'; ?>

</body>

<script type="text/javascript">
  function hapus() {
    Swal.fire({
      title: "Yakin hapus format ini?",
      text: "<?php echo $no_sk; ?>",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#f0ad4e",
      confirmButtonText: '<a href="act/format/hapus.php?id2=<?php echo $_GET['format'] ?>" style="color: #ffffff">Hapus se</a>'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Please wait..",
          text: "sedang menghapus data dan file format..",
          icon: "success"
        }).then(function() {
          window.location = "act/format/hapus.php?id2=<?php echo $_GET['format'] ?>";
        });
      }
    });
  }
</script>


</html>