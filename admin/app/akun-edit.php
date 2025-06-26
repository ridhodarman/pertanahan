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
                        <h1 class="mt-4">Edit Data</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Administrator</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="container">
                                <?php
                                $id2 = base64_decode($_GET['id']);
                                $username="";
                                $query = "SELECT id, username, keterangan FROM akun WHERE id = ?";
                                $sql = $koneksi->prepare($query);
                                $sql->bind_param("i", $id2);
                                $sql->execute();
                                $data = $sql->get_result();
                                  while ($row = $data->fetch_assoc()) {
                                    $username = $row['username'];
                                    $keterangan = $row['keterangan'];
                                    }
                                ?>
                                <form action="act/akun-edit.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                    <div class="row mb-3 mt-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="username" value="<?php echo $username; ?>" required />
                                                <label for="inputFirstName">Username</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="keterangan" value="<?php echo $keterangan; ?>"/>
                                        <label for="inputEmail">Keterangan</label>
                                    </div>
                                    <div class="mt-4 mb-3">
                                        <div class="d-grid"><button name="akunbaru" type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="card mb-4 mt-5">
                            <div class="container">
                                <form action="act/akun-ganti-pw.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                    <label class="mt-2"><h5>Ganti Password</h5></label>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="password2" required />
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-3">
                                        <div class="d-grid"><button name="akunbaru" type="submit" class="btn btn-warning btn-block">Ganti Password</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="card mb-4 mt-5">
                            <div class="container mt-2 mb-2">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal4">
                                    Hapus Akun
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Akun ?</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                data akun akan dihapus secara permanen
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="act/akun-hapus.php?id=<?php echo $_GET['id']; ?>">
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </a>
                              </div>
                            </div>
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

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </body>
</html>
