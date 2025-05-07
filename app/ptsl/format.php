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
					<div class="short-popular-category-list text-center">
						<h2>DAFTAR FORMAT</h2>
						<li class="list-inline-item"><a class="btn btn-secondary" href="format-tambah.php">Tambah Format</a></li>
					</div>
				</div>

				<!-- Modal -->
				

				<!-- Advance Search -->
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Nomor SK</th>
								      <th scope="col">Tanggal SK</th>
								      <th scope="col">Action</th>
								    </tr>
								  </thead>
								  <tbody>
								    <?php
								    include 'inc/koneksi.php';
                $batas = 20;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi, "select id from format_ptsl");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                $query = "SELECT id, no_sk, tanggal_sk, file_sk FROM format_ptsl ORDER BY tanggal_sk DESC limit ?, ?";
                $sql = $koneksi->prepare($query);
                $sql->bind_param("ss", $halaman_awal, $batas);
                $sql->execute();
                $data = $sql->get_result();
                $no = $halaman_awal + 1;

                if ($data->num_rows > 0) {
                  while ($row = $data->fetch_assoc()) {
                    $id = $row['id'];
                    $no_sk = $row['no_sk'];
                    $tanggal_sk = $row['tanggal_sk'];
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $no_sk; ?></td>
                      <td><?php echo $tanggal_sk; ?></td>
                      <td>
                        <a href="format-edit.php?id=<?php echo base64_encode($id) ?>"><button type="button" class="btn-sm btn-info">Detail</button></a>
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



