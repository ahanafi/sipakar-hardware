<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true): ?>
		<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
			<a class="navbar-brand brand-logo pt-0" href="<?php echo base_url('dashboard'); ?>">
				<img src="<?php echo assets('images/ucic-yellow.png'); ?>" alt="logo"/> </a>
			<a class="navbar-brand brand-logo-mini pt-0" href="<?php echo base_url('dashboard'); ?>">
				<img src="<?php echo assets('images/ucic-simple.png'); ?>" alt="logo"/> </a>
		</div>
	<?php else: ?>
		<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center bg-white">
			<a class="navbar-brand brand-logo pt-0" href="#">
				<img class="mt-0" src="<?php echo assets('images/ucic.png'); ?>" alt="logo" style="width: 45%;" /> </a>
			<a class="navbar-brand brand-logo-mini pt-0" href="#">
				<img src="<?php echo assets('images/ucic-simple.png'); ?>" alt="logo"/> </a>
		</div>
	<?php endif; ?>
	<div class="navbar-menu-wrapper d-flex align-items-center">
		<ul class="navbar-nav">
			<li class="nav-item font-weight-semibold d-none d-lg-block">
				<?php if (isset($_SESSION['is_logged_in'])): ?>
					User :
					<?php echo getUser('nama_lengkap') . " login at " . $_SESSION['logged_in_at']; ?>
				<?php else: ?>
					Aplikasi Sistem Pakar Kerusakan Hardware Komputer (Fordward Chaining)
				<?php endif; ?>
			</li>
		</ul>
		<?php if (isset($_SESSION['is_logged_in'])): ?>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
					<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
					   aria-expanded="false">
						<img class="img-xs rounded-circle" src="<?php echo assets('images/faces/face8.jpg'); ?>"
							 alt="Profile image">
						<span class="ml-2"><?php echo getUser('nama_lengkap'); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
						<div class="dropdown-header text-center">
							<img class="img-md rounded-circle" src="<?php echo assets('images/faces/face8.jpg'); ?>"
								 alt="Profile image">
							<p class="mb-1 mt-3 font-weight-semibold"><?php echo getUser('nama_lengkap'); ?></p>
							<p class="font-weight-light text-muted mb-0"><?php echo getUser('level'); ?></p>
						</div>
						<a href="#" class="dropdown-item">
							Profil Saya
							<i class="dropdown-item-icon ti-dashboard"></i>
						</a>
						<a href="#" class="dropdown-item">
							Ubah Kata Sandi
							<i class="dropdown-item-icon ti-comment-alt"></i>
						</a>
						<a onclick="confirmLogout()" href="#" class="dropdown-item">
							Keluar
							<i class="dropdown-item-icon ti-power-off"></i>
						</a>
					</div>
				</li>
			</ul>
		<?php endif; ?>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
				data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
