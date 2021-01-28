<div class="main-panel">
	<div class="content-wrapper">
		<!-- Page Title Header Starts-->
		<?php echo showPageHeader(); ?>
		<!-- Page Title Header Ends-->
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-header header-sm d-flex justify-content-between align-items-center">
						<h4 class="card-title">Data Fakultas</h4>
						<a href="<?php echo base_url(uriSegment(1) . '/create'); ?>"
						   class="ml-auto btn btn-primary btn-fw">
							<i class="fa fa-plus"></i>
							<span>Tambah Data</span>
						</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="order-listing" class="table table-striped">
								<thead>
								<tr>
									<th>Nomor</th>
									<th>ID Gejala</th>
									<th>Nama Gejala</th>
									<th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($gejala as $gj): ?>
									<tr>
										<td><?php echo $nomor++; ?></td>
										<td><?php echo $gj->id_gejala; ?></td>
										<td><?php echo $gj->nama_gejala; ?></td>
										<td>
											<a href="<?php echo base_url('gejala/edit/' . $gj->id_gejala); ?>"
											   class="btn btn-success text-white">Edit</a>
											<a href="#"
											   onclick="showConfirmDelete('gejala', '<?php echo $gj->id_gejala; ?>')"
											   class="btn btn-danger">Hapus</a>
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
