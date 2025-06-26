<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Dashboard - SB Admin</title>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />
<script src="../../assets/fontawesome-free-6.5.2-web/js/all.js" crossorigin="anonymous"></script>

<?php
session_start();
if ($_SESSION['administrator']!="administrator") {
        header("Location: ../../403");
}
require_once('../../inc/koneksi.php');
?>