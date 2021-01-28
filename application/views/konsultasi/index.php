<div class="main-panel">
	<div class="content-wrapper">
		<!-- Page Title Header Starts-->
		<?php echo showPageHeader(); ?>
		<!-- Page Title Header Ends-->
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-header header-sm d-flex justify-content-between align-items-center">
						<h4 class="card-title">Data Konsultasi</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="order-listing" class="table table-striped">
								<thead>
								<tr>
									<th>Nomor</th>
									<th>Nama Pengguna</th>
									<th>Jenis Hardware</th>
									<th>Merk - Tipe</th>
									<th>Kerusakan</th>
									<th>Waktu</th>
									<th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($konsultasi as $k): ?>
									<tr>
										<td><?php echo $nomor++; ?></td>
										<td><?php echo $k->nama; ?></td>
										<td><?php echo $k->perangkat_keras; ?></td>
										<td><?php echo $k->merk ." - " . $k->tipe; ?></td>
										<td><?php echo $k->kerusakan; ?></td>
										<td><?php echo $k->waktu; ?></td>
										<td>
											<a href="#" onclick="showConfirmDelete('konsultasi', '<?php echo $k->id_konsultasi; ?>')" class="btn btn-danger">Hapus</a>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
