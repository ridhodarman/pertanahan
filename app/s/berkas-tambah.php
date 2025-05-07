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
                  <option>-</option>
                  <option value="Jual Beli">Jual Beli</option>
                  <option value="Hibah">Hibah</option>
                  <option value="Waris">Waris</option>
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