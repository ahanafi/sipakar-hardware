<div class="main-panel">
	<div class="content-wrapper">
		<!-- Page Title Header Starts-->
		<?php echo showPageHeader(); ?>
		<!-- Page Title Header Ends-->
		<div class="row">
			<div class="col-md-8 grid-margin stretch-card">
				<div class="card">
					<div class="card-header header-sm d-flex justify-content-between align-items-center">
						<h4 class="card-title">Form Edit Perangkat Keras</h4>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('jenis-perangkat-keras/edit/' . $perangkat->id_perangkat_keras); ?>" class="form-sample" method="POST"
							  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">ID Perangkat Keras</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="id_perangkat_keras"
												   value="<?php echo $perangkat->id_perangkat_keras; ?>" required
												   autocomplete="off" readonly>
											<?php echo form_error('id_perangkat_keras'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Nama Perangkat Keras</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="nama_perangkat_keras"
												   value="<?php echo $perangkat->nama_perangkat_keras; ?>" required
												   autocomplete="off">
											<?php echo form_error('nama_perangkat_keras'); ?>
										</div>
									</div>
									<div class="form-group row text-right">
										<div class="col-sm-8 offset-3">
											<button class="btn btn-success" type="submit" name="update">SIMPAN</button>
											<a href="<?php echo base_url('jenis-perangkat-keras'); ?>"
											   class="btn btn-secondary">KEMBALI</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
