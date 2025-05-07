<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>
<?php include("inc/head.php") ?>
</head>

<body class="body-wrapper">
<?php include("inc/header.php") ?>

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

<?php
  include 'inc/koneksi.php';
  $id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['format']), ENT_QUOTES)));

  $query = "SELECT * FROM format_ptsl WHERE id=?";
  $sql = $koneksi->prepare($query);
  $sql->bind_param("i", $id);
  $sql->execute();
  $data = $sql->get_result();
  while ($row = $data->fetch_assoc()) {
    $no_sk = $row['no_sk'];
    $tanggal_sk = $row['tanggal_sk'];
    $file_sk = $row['file_sk'];
    $risalah = $row['risalah'];
  }

?>
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<form action="act/format-tambah.php" method="post" enctype="multipart/form-data">
					<h2>Edit Format</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
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
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <button name="kirim" type="submit" class="btn btn-info">Simpan Perubahan Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

					<div class="row">

						<div class="col-md-12 form-group">
							<label> File Surat Keputusan (SK): </label>
              <?php
                if ($file_sk) {
              ?> <a target="_blank" href="format/<?php echo $file_sk; ?>">
                <button type="button" class="btn-sm btn-warning">Unduh SK</button>
              </a>
              <?php
                } else {
                  ?> <font color="red">file SK belum di-upload</font> <?php
                }
              ?>
              <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modal-fileSK">Upload File SK</button>
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
                          <label>Ganti File SK</label>
                          <p><small>upload dalam format *.pdf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_sk" />
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button name="kirim" type="submit" class="btn-sm btn-primary">Simpan SK</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
						</div>

						<div class="col-md-12 form-group">
              <label>Format Risalah:</label>
              <?php
                if ($risalah) {
              ?>
              <a href="format/<?php echo $risalah; ?>">
                <button type="button" class="btn-sm btn-warning">Unduh Format</button>
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
                          <label>Format Risalah</label>
                          <p><small>upload dalam format *.rtf</small>
                            <br /><small>file yang lama akan ditimpa</small>
                          </p>
                          <input type="file" class="form-control" name="file_ris">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button name="kirim" type="submit" class="btn-sm btn-primary">Simpan Format</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

					</div>
          <div style="text-align: right;">
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Hapus Format ini</button>
          </div>
				</div>		
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin hapus format ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        No. SK: <?php echo $no_sk ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="act/format/hapus.php?id2=<?php echo $_GET['format'] ?>">
        <button type="button" class="btn btn-danger">Hapus se</button>
        </a>
      </div>
    </div>
  </div>
</div>

<!--============================
=            Footer            =
=============================-->

<?php include("inc/footer.php") ?>

</body>

</html>