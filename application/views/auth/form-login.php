<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?php echo assets('vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/iconfonts/ionicons/dist/css/ionicons.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/css/vendor.bundle.base.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/css/vendor.bundle.addons.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets('vendors/sweetalert2/sweetalert2.css'); ?>">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo assets('css/shared/style.css'); ?>">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?php echo assets('images/favicon.ico'); ?>"/>
</head>
<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
			<div class="row w-100">
				<div class="col-lg-4 mx-auto">
					<div class="auto-form-wrapper mb-5 pt-0">
					<img src="<?php echo assets('images/ucic.png'); ?>" alt="" class="img-fluid mb-4">

						<form action="<?php echo base_url('login'); ?>" method="POST">
							<div class="form-group">
								<label class="label">Username</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Username" name="username" required autocomplete="off">
									<div class="input-group-append">
										<span class="input-group-text">
										  <i class="mdi mdi-check-circle-outline"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="label">Password</label>
								<div class="input-group">
									<input type="password" class="form-control" placeholder="*********" name="password" required autocomplete="off">
									<div class="input-group-append">
										<span class="input-group-text">
										  <i class="mdi mdi-check-circle-outline"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="login" class="btn btn-primary submit-btn btn-block">Login</button>
							</div>
						</form>
					</div>
					<p class="footer-text text-center">Copyright © 2020 Bootstrapdash. All rights reserved.</p>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo assets('vendors/js/vendor.bundle.base.js'); ?>"></script>
<script src="<?php echo assets('vendors/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo assets('js/shared/alerts.js'); ?>"></script>
<?php if (isset($_SESSION['message']) && $_SESSION['message'] != ''): ?>
	<script type="text/javascript">
		showAlert('message', '<?php echo $_SESSION['message']['type']; ?>', '<?php echo ucfirst($_SESSION['message']['type']); ?>', '<?php echo $_SESSION['message']['text']; ?>');
	</script>
<?php endif;
$_SESSION['message'] = ''; ?>
<!-- endinject -->
<!-- inject:js -->
<script src="<?php echo assets('js/shared/off-canvas.js'); ?>"></script>

<!-- endinject -->
</body>
</html>
