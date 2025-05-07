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

<?php
$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['id']), ENT_QUOTES)));

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
  $kecamatan = $row['kecamatan'];
  $nib = $row['nib'];
  $id_format = $row['id_format'];
 }
?>

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
						<div class="category-block">

							<div class="header">
								<i class="fa fa-laptop icon-bg-8"></i>
								<h4>Cetak</h4>
							</div>
							<ul class="category-list">
								<li><a style="color: royalblue;" href="act/cetak-risalah.php?id=<?php echo($_GET['id']) ?>">Cetak Risalah
									<i class="fa fa-paper-plane-o"></i>
									<i class="fa fa-sticky-note-o"></i>
									<i class="fa fa-sticky-note"></i>
									<i class="fa fa-newspaper-o"></i>
									<span><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
								</a></li>
                <li><a style="color: royalblue;" href="act/cetak-tandaterima.php?id=<?php echo($_GET['id']) ?>">Cetak Tanda Terima
                  <span><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                </a></li>
								<li><a href="#">Cetak BA Pengesahan <span>233</span></a></li>
								<li><a href="#">Cetak Pengumuman Fisik <span>183</span></a></li>
								<li><a href="#">Cetak BA Pengesahan <span>343</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
			<div class="col-lg-9">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<form action="act/berkas-update.php" method="post">
						<input type="hidden" name="id" value="<?php echo base64_encode($id) ?>">
					<h2>Edit Data</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Nomor Berkas</label>
								<input type="text" class="form-control" name="nomor_berkas" value="<?php echo $nomor_berkas ?>">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Tahun Berkas</label>
								<input type="text" class="form-control" name="tahun" value="<?php echo $tahun ?>">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Nama Pemohon</label>
								<input type="text" class="form-control" name="nama_pemohon" value="<?php echo $nama_pemohon ?>">
							</div>
						</div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">NIK</label>
                <input type="text" class="form-control" name="nik" value="<?php echo $nik ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $tanggal_lahir ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" value="<?php echo $pekerjaan ?>">
              </div>
            </div>
						<div class="col-lg-4">
							<div class="form-group">
								<label style="color: black;">Nagari</label>
								<input type="text" class="form-control" name="nagari" value="<?php echo $nagari ?>">
							</div>
						</div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Jorong</label>
                <input type="text" class="form-control" name="jorong" value="<?php echo $jorong ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal PBB</label>
                <input type="date" class="form-control" name="tanggal_pbb" value="<?php echo $tanggal_pbb ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal Surat Penguasaan Fisik</label>
                <input type="date" class="form-control" name="tanggal_surat_peng_fisik" value="<?php echo $tanggal_surat_peng_fisik ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Nomor Surat Keterangan Wali Nagari</label>
                <input type="text" class="form-control" name="nomor_surat_keterangan_wn" value="<?php echo $nomor_surat_keterangan_wn ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Tanggal Surat Keterangan Wali Nagari</label>
                <input type="date" class="form-control" name="tanggal_surat_keterangan_wn" value="<?php echo $tanggal_surat_keterangan_wn ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Jenis Peristiwa</label>
                <select class="form-control w-100" name="jenis_peristiwa">
                  <option value="<?php echo $jenis_peristiwa ?>"><?php echo $jenis_peristiwa ?></option>
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
                <input type="date" class="form-control" name="tanggal_peristiwa" value="<?php echo $tanggal_peristiwa ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">NIB</label>
                <input type="text" class="form-control" name="nib" value="<?php echo $nib ?>">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label style="color: black;">Pilih SK/Format</label>
                <select class="form-control w-100" name="id_format">
                  <?php
                      $query = "SELECT id, no_sk, tanggal_sk FROM format_ptsl 
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
								<input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan ?>">
							</div>
						</div> -->
					</div>
          <div style="text-align: right;">
            <button class="btn btn-transparent" name="berkasbaru">Save My Changes</button>
          </div>
					</form>
				</div>
				<!-- Edit Personal Info -->
			</div>
		</div>
	</div>

  <div class="ml-5 mt-5">
    <button type="button" class="btn btn-outline-danger" onclick='hapus("<?php echo base64_encode($id) ?>", <?php echo $nomor_berkas ?>)'>Hapus</button>
    <a href="index.php">
      <button type="button" class="btn btn-outline-secondary">Kembali Ke Halaman Awal</button>
    </a>
  </div>

</section>


<script type="text/javascript">
  function hapus(id, berkas) {
    Swal.fire({
    title: "Yakin Hapus Berkas?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "hapus se"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = `act/berkas-hapus.php?id=${id}&berkas=${berkas}`;
      Swal.fire({
        title: "proses hapus berkas",
        text: "tunggu...",
        icon: "success"
      });
    }
  });
  }
</script>

<!--============================
=            Footer            =
=============================-->

<?php include("inc/footer.php") ?>

</body>

</html>