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
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<form action="act/berkas-tambah.php" method="post">
					<h2>Tambah Data</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Nomor Berkas</label>
								<input type="text" class="form-control" name="nomor_berkas">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Tahun Berkas</label>
								<input type="text" class="form-control" name="tahun">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Nama Pemohon</label>
								<input type="text" class="form-control" name="nama_pemohon">
							</div>
						</div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">NIK</label>
                <input type="text" class="form-control" name="nik">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan">
              </div>
            </div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Nagari</label>
								<input type="text" class="form-control" name="nagari">
							</div>
						</div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Jorong</label>
                <input type="text" class="form-control" name="jorong">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal PBB</label>
                <input type="date" class="form-control" name="tanggal_pbb">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal Surat Penguasaan Fisik</label>
                <input type="date" class="form-control" name="tanggal_surat_peng_fisik">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Nomor Surat Keterangan Wali Nagari</label>
                <input type="text" class="form-control" name="nomor_surat_keterangan_wn">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal Surat Keterangan Wali Nagari</label>
                <input type="date" class="form-control" name="tanggal_surat_keterangan_wn">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Jenis Peristiwa</label>
                <select class="form-control w-100" name="jenis_peristiwa">
                  <option value="">-</option>
                  <option value="Jual Beli">Jual Beli</option>
                  <option value="Hibah">Hibah</option>
                  <option value="Waris">Waris</option>
                  <option value="Turun-temurun">Turun-temurun</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal Peristiwa</label>
                <input type="date" class="form-control" name="tanggal_peristiwa">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">NIB</label>
                <input type="text" class="form-control" name="nib">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Pilih SK/Format</label>
                <select class="form-control w-100" name="id_format">
                  <option value=""></option>
                  <?php
                      $akun_id = $_SESSION['user_id'];
                      $query = "SELECT id, no_sk, tanggal_sk 
                                FROM format_ptsl 
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
                      ?>
                        <option value="<?php echo $id; ?>"><?php echo $no_sk; ?> tanggal <?php echo $tanggal_sk; ?></option>
                        <?php }
                      } 
                    ?>
                </select>
                <!-- <input type="text" class="form-control" name="id_format"> -->
              </div>
            </div>
						<!-- <div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Kecamatan</label>
								<input type="text" class="form-control" name="kecamatan">
							</div>
						</div> -->
					</div>
          <div style="text-align: right;">
            <button class="btn btn-transparent" name="berkasbaru">Simpan</button>
          </div>
					</form>
				</div>
				
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->

<?php include("inc/footer.php") ?>

</body>

</html>