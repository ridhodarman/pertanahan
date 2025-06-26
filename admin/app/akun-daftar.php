<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "inc/head.php" ?>
    </head>
    <body class="sb-nav-fixed">
        <?php include "inc/sidebar.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Administrator</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Menampilkan seluruh akun administrator,
                                <a href="akun-tambah.php">klik disini untuk tambah akun</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Akun
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Akun</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT id, username, keterangan FROM akun";
                                        $sql = $koneksi->prepare($query);
                                        $sql->execute();
                                        $data = $sql->get_result();
                                        $no=1;
                                          while ($row = $data->fetch_assoc()) {
                                            $id = $row['id'];
                                            $username = $row['username'];
                                            $keterangan = $row['keterangan'];
                                        ?>
                                            <tr>
                                              <td><?php echo $no++; ?></td>
                                              <td><?php echo $username; ?></td>
                                              <td><?php echo $keterangan; ?></td>
                                              <td>
                                                <a href="akun-edit.php?id=<?php echo base64_encode($id) ?>">
                                                  <button type="button" class="btn btn-outline-info btn-sm">Detail</button>
                                              </td>
                                              </a>
                                            </tr>
                                          <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
