<div class="main-panel">
	<div class="content-wrapper">
		<!-- Page Title Header Starts-->
		<?php echo showPageHeader(); ?>
		<!-- Page Title Header Ends-->
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-header header-sm d-flex justify-content-between align-items-center">
						<h4 class="card-title">Data Perangkat Keras</h4>
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
									<th>ID Perangkat Keras</th>
									<th>Nama Perangkat Keras</th>
									<th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($perangkat_keras as $pk): ?>
									<tr>
										<td><?php echo $nomor++; ?></td>
										<td><?php echo $pk->id_perangkat_keras; ?></td>
										<td><?php echo $pk->nama_perangkat_keras; ?></td>
										<td>
											<a href="<?php echo base_url('jenis-perangkat-keras/edit/' . $pk->id_perangkat_keras); ?>"
											   class="btn btn-success text-white">Edit</a>
											<a href="#" onclick="showConfirmDelete('jenis-perangkat-keras', '<?php echo $pk->id_perangkat_keras; ?>')" class="btn btn-danger">Hapus</a>
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
