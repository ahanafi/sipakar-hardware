<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<?php if (isset($_SESSION['is_logged_in'])): ?>
			<li class="nav-item nav-profile ml-3 mr-3">
				<a href="#" class="nav-link">
					<div class="profile-image">
						<img class="img-xs rounded-circle" src="<?php echo assets('images/faces/face8.jpg'); ?>"
							 alt="profile image">
						<div class="dot-indicator bg-success"></div>
					</div>
					<div class="text-wrapper">
						<p class="profile-name">
							<?php
							$namaLengkap = getUser('nama_lengkap');
							$arrNama = explode(" ", $namaLengkap);
							if (count($arrNama) > 2) {
								$namaLengkap = $arrNama[0] . " " . $arrNama[1];
							}

							echo $namaLengkap;
							?>
						</p>
						<p class="designation"><?php echo str_replace("_", " ", getUser('level')); ?></p>
					</div>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
					<i class="menu-icon typcn typcn-document-text"></i>
					<span class="menu-title">Dashboard</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('jenis-perangkat-keras'); ?>">
					<i class="menu-icon typcn typcn-shopping-bag"></i>
					<span class="menu-title">Data Perangkat Keras</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('kerusakan'); ?>">
					<i class="menu-icon typcn typcn-shopping-bag"></i>
					<span class="menu-title">Data Kerusakan</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('data-konsultasi'); ?>">
					<i class="menu-icon typcn typcn-shopping-bag"></i>
					<span class="menu-title">Data Konsultasi</span>
				</a>
			</li>
			<?php if (showOnlyTo('ADMINISTRATOR')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('user'); ?>">
						<i class="menu-icon typcn typcn-user-outline"></i>
						<span class="menu-title">Manajemen Pengguna</span>
					</a>
				</li>
			<?php endif; ?>
		<?php else: ?>
			<li class="nav-item nav-profile ml-3 mr-3">
				<a href="#" class="nav-link">
					<div class="profile-image">
						<img class="img-xs rounded-circle" src="<?php echo assets('images/s-logo.svg'); ?>"
							 alt="profile image">
					</div>
					<div class="text-wrapper">
						<p class="profile-name">
							SISTEM PAKAR
						</p>
						<p class="designation">Kerusakan Hardware</p>
					</div>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="menu-icon typcn typcn-shopping-bag"></i>
					<span class="menu-title">Cara Penggunaan</span>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</nav>
<!-- partial -->
