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
				
				<!-- Advance Search -->
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<table class="table">
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
								    include 'inc/koneksi.php';
                    $akun_id=$_SESSION['user_id'];
								$cari = $_GET['cari'];
								$jenis = $_GET['jenis'];

                $batas = 20;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi, "select id from berkas_ptsl");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $cari2 = "%".strtolower($cari)."%";

                $sql1 = "SELECT id, nomor_berkas, nama_pemohon, desa_nagari, kecamatan, tahun 
                        FROM berkas_ptsl
                        WHERE akun_id = ? AND
                        ";
                $sql2 = "";
                $sql3 =" ORDER BY waktu_entri DESC limit ?, ?";

                if ($jenis=="desa") {
                	$sql2 = "LOWER(desa_nagari) LIKE ?";
                }
                else if ($jenis=="nomor") {
                	$sql2 = "nomor_berkas LIKE ?";
                }
                else if ($jenis=="nama") {
                	$sql2 = "LOWER(nama_pemohon) LIKE ?";
                }

                $query = $sql1.$sql2.$sql3;
                $sql = $koneksi->prepare($query);
                $sql->bind_param("ssss", $akun_id, $cari2, $halaman_awal, $batas);
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
                      <td><?php echo $nagari . ", " . $kecamatan; ?></td>
                      <td>
                        <a href="berkas-edit.php?id=<?php echo base64_encode($id) ?>"><button type="button" class="">Detail</button></a>
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
								<a href="index.php#pencarian">
												<button type="submit" class="btn btn-secondary active w-50 mt-5">Kembali Ke Halaman Sebelumnya</button>
											</a>
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

</body>

</html>



