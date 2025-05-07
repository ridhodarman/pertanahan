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
					<form action="act/format-tambah.php" method="post" enctype="multipart/form-data">
					<h2>Tambah Format</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Nomor SK</label>
								<input type="text" class="form-control" name="no_sk">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Tanggal SK</label>
								<input type="date" class="form-control" name="tanggal_sk">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">File SK</label>
								<input type="file" class="form-control" name="file_sk">
							</div>
						</div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Format Risalah (*.rtf)</label>
                <input type="file" class="form-control" name="file_risalah" required>
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