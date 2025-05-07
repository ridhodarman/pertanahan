<!-- ** Basic Page Needs ** -->
<meta charset="utf-8">
<title>Pendaftaran ...</title>

<!-- ** Mobile Specific Metas ** -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Agency HTML Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="author" content="Themefisher">
<meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

<!-- theme meta -->
<meta name="theme-name" content="classimax" />

<!-- favicon -->
<link href="images/favicon.png" rel="shortcut icon">

<!-- 
Essential stylesheets
=====================================-->
<link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="plugins/slick/slick.css" rel="stylesheet">
<link href="plugins/slick/slick-theme.css" rel="stylesheet">
<link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<script src="plugins/sweetalert2/sweetalert2@11"></script>

<?php
session_start();
if (!$_SESSION['user_id']) {
	header("Location: ../../403");
}
require_once('inc/koneksi.php');
?>