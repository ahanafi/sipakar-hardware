<div class="main-panel">
	<div class="content-wrapper">
		<!-- Page Title Header Starts-->
		<?php echo showPageHeader(); ?>
		<!-- Page Title Header Ends-->
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-header header-sm d-flex justify-content-between align-items-center">
						<h4 class="card-title">Form Tambah Gejala</h4>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('kerusakan/create'); ?>" class="form-sample" method="POST"
							  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">ID Kerusakan</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="id_kerusakan" value="<?php echo $id_kerusakan; ?>" required autocomplete="off" readonly>
											<?php echo form_error('id_kerusakan'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Perangkat Keras</label>
										<div class="col-sm-4">
											<select name="id_perangkat_keras" id="" class="form-control" required>
												<option>-- Pilih Perangkat Keras --</option>
												<?php foreach ($perangkat_keras as $p):?>
													<option value="<?php echo $p->id_perangkat_keras; ?>">
														<?php echo $p->nama_perangkat_keras; ?>
													</option>
												<?php endforeach; ?>
											</select>
											<?php echo form_error('id_perangkat_keras'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Nama Kerusakan</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="nama_kerusakan" placeholder="Masukkan nama kerusakan"
												   value="<?php echo set_value('nama_kerusakan'); ?>" required
												   autocomplete="off">
											<?php echo form_error('nama_kerusakan'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Solusi</label>
										<div class="col-sm-10">
											<textarea name="solusi" id="solusi" required><?php echo set_value('solusi'); ?></textarea>
											<?php echo form_error('solusi'); ?>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-10 offset-2">
											<button class="btn btn-success" type="submit" name="submit">SIMPAN</button>
											<a href="<?php echo base_url('kerusakan'); ?>" class="btn btn-secondary">KEMBALI</a>
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
