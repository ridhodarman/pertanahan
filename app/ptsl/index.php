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


<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Pendaftaran tanah </h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare vitae risus sed auctor.</p>
					<div class="short-popular-category-list text-center">
						<h2>Enteri</h2>
						<li class="list-inline-item"><a class="btn btn-secondary" href="berkas-tambah.php">Tambah Berkas</a></li>
						<ul class="list-inline">
							<li class="list-inline-item" id="berkas">
								<a href="#" data-toggle="modal" data-target="#exampleModal" style="font-size: 12pt; background-color: rgba(0, 0, 0, 0.46);">
									<i class="fa fa-coffee"></i> Pengantar Pengumuman</a>
								</li>
								<li class="list-inline-item" id="berkas">
								<a href="#" data-toggle="modal" data-target="#exampleModal" style="font-size: 12pt; background-color: rgba(0, 0, 0, 0.46);">
									<i class="fa fa-coffee"></i> Cetak Nominatif</a>
								</li>
						</ul>
					</div>
				</div>

				<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Cetak Pengantar Pengumuman</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <div class="form-group">
					        	<div class="row">
					        		<div class="col-lg-3">
					        			<label style="color: black;">Nama Desa/Nagari</label>
					        		</div>
					        		<div class="col-lg-9">
					        			<input type="text" class="form-control" name="desa_nagari" placeholder="masukkan namo nagari atau desa/kelurahan">
					        			<!-- <label style="color: black;">Tahun Anggaran</label>
					        			<input type="text" class="form-control" name="tahun" placeholder="masukkan tahun anggarannyo"> -->
					        		</div>
					        		<div class="col-lg-3 mt-2">
					        			<label style="color: black;">Tahun Anggaran</label>
					        		</div>
					        		<div class="col-lg-9 mt-2">
					        			<input type="text" class="form-control" name="tahun" placeholder="masukkan tahun anggarannyo">
					        		</div>
					        	</div>
									</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					        <button type="button" class="btn btn-primary">Next</button>
					      </div>
					    </div>
					  </div>
					</div>

				<!-- Advance Search -->
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">No.Berkas/tahun</th>
								      <th scope="col">Nama</th>
								      <th scope="col">Lokasi</th>
								      <th scope="col">Action</th>
								    </tr>
								  </thead>
								  <tbody>
								    <?php
                $akun_id=$_SESSION['user_id'];
                $batas = 20;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi, "select id from berkas_ptsl");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                $query = "SELECT id, nomor_berkas, nama_pemohon, desa_nagari, kecamatan, tahun 
                					FROM berkas_ptsl
                          WHERE akun_id = ?
                					ORDER BY waktu_entri DESC limit ?, ?";
                $sql = $koneksi->prepare($query);
                $sql->bind_param("sss", $akun_id, $halaman_awal, $batas);
                $sql->execute();
                $data = $sql->get_result();
                $no = $halaman_awal + 1;

                if ($data->num_rows > 0) {
                  while ($row = $data->fetch_assoc()) {
                    $id = $row['id'];
                    $nomor_berkas = $row['nomor_berkas'];
                    $tahun = $row['tahun'];
                    $nama_pemohon = $row['nama_pemohon'];
                    $nagari = $row['desa_nagari'];
                    $kecamatan = $row['kecamatan'];
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $nomor_berkas . "/" . $tahun; ?></td>
                      <td><?php echo $nama_pemohon ?></td>
                      <td><?php echo $nagari ?></td>
                      <td>
                        <a href="berkas-edit.php?id=<?php echo base64_encode($id) ?>"><button type="button" class="btn-sm btn-info">Detail</button></a>
                      </td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td colspan='5'>Tidak ada data ditemukan</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" <?php if ($halaman > 1) {
                                          echo "href='?halaman=$previous'";
                                        } ?>>Previous</a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                  <a class="page-link" <?php if ($halaman < $total_halaman) {
                                          echo "href='?halaman=$next'";
                                        } ?>>Next</a>
                </li>
              </ul>
            </nav>
								<form action="berkas-cari.php" method="get">
									<div class="form-row">
										<div class="form-group col-xl-2 col-lg-3 col-md-6">
											<input type="text" class="form-control my-2 my-lg-1" id="pencarian"
												placeholder="Cari berdasarkan..." disabled>
										</div>
										<div class="form-group col-lg-3 col-md-6">
											<select class="w-100 form-control mt-lg-1 mt-md-2" name="jenis" id="jenis" required>
												<option value="">Category</option>
												<option value="desa">Desa/Nagari</option>
												<option value="nomor">Nomor Berkas</option>
												<option value="nama">Nama Pemohon</option>
											</select>
										</div>
										<div class="form-group col-lg-5 col-md-6">
											<input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" name="cari" placeholder="cari a..." required>
										</div>
										<div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
											<button type="submit" class="btn btn-primary active w-100" onclick="cekjenis()">Search Now</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>



<!--============================
=            Footer            =
=============================-->

<?php include("inc/footer.php") ?>

<?php
  if(isset($_GET['sukses'])){
    $sukses=$_GET['sukses'];
    echo '
      <script type="text/javascript">
      $(document).ready(function (){
        Swal.fire({
          position: "bottom-end",
          icon: "success",
          title: "'.$sukses.'",
          showConfirmButton: false,
          timer: 1500
        });
      });
      document.getElementById("berkas").scrollIntoView();
    </script>
    ';
  }
?>

<script type="text/javascript">
	function cekjenis(){
		let jenis = document.getElementById("jenis").value;
		if (jenis==""){
			Swal.fire({
			  title: "Kategori pencarian alun dipilih",
			  text: "pilih lu",
			  icon: "warning"
			});
		}
	}
</script>
</body>

</html>



