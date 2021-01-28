<?php
defined('BASEPATH') or exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

$sideBarClass = 'sidebar-fixed';
if(!isset($_SESSION['is_logged_in'])) {
	$sideBarClass = 'sidebar-toggle-display sidebar-hidden';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistem Pakar Kerusakan Hardware Komputer</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?php echo assets('vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/iconfonts/ionicons/dist/css/ionicons.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/iconfonts/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/css/vendor.bundle.base.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/css/vendor.bundle.addons.css'); ?>">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?php echo assets('vendors/owl-carousel-2/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('vendors/owl-carousel-2/owl.theme.default.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/datatables.net-bs4/dataTables.bootstrap4.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/sweetalert2/sweetalert2.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/summernote/dist/summernote-bs4.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/select2/select2.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/select2-bootstrap-theme/select2-bootstrap.min.css'); ?>">
	<?php if(($uri1 == "berita-acara" || $uri1 == "jadwal-kuliah") && ($uri2 == "create" || $uri2 == "edit")): ?>
	<link rel="stylesheet" href="<?php echo assets('vendors/gijgo/css/gijgo.min.css'); ?>">
	<?php endif; ?>

	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo assets('css/shared/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('css/my-style.css'); ?>">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="<?php echo assets('css/demo/style.css'); ?>">
	<!-- End Layout styles -->
	<link rel="shortcut icon" href="<?php echo assets('images/ucic.png'); ?>"/>
</head>
<body class="<?php echo $sideBarClass; ?>">
<div class="container-scroller">
