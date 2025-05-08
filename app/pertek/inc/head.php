<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Pertek Seksi 3</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">

<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- =======================================================
* Template Name: Serenity
* Updated: Sep 18 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
<script src="assets/jquery-3.7.1.min.js"></script>
<script src="assets/sweetalert2/sweetalert2@11"></script>

<!-- <script src="assets/sweetalert2/sweetalert2.js"></script> -->

<!-- <script src="assets/sweetalert2/src/sweetalert2.js"></script>
<script src="assets/sweetalert2/src/sweetalert2@11"></script> -->

<link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/fontawesome-free-6.5.2-web/css/all.min.css" />

<?php
session_start();
if (!$_SESSION['user_id']) {
	header("Location: ../../403");
}
require_once('inc/koneksi.php');
?>