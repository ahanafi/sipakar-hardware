<div class="main-panel">
	<div class="content-wrapper">
		<!-- Page Title Header Starts-->
		<?php echo showPageHeader(); ?>
		<!-- Page Title Header Ends-->
		<div class="row">
			<div class="col-md-7 grid-margin stretch-card">
				<div class="card">
				<div class="card-header header-sm d-flex justify-content-between align-items-center">
					<h4 class="card-title">Form Tambah Solusi</h4>
				</div>
					<div class="card-body">
						<form action="<?php echo base_url('solusi/create'); ?>" class="form-sample" method="POST">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">ID Solusi</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="id_solusi" value="<?php echo $id_solusi; ?>" required autocomplete="off" readonly>
											<?php echo form_error('id_solusi'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Deskripsi</label>
										<div class="col-sm-8">
											<textarea name="deskripsi" rows="5" placeholder="Deskripsi"
													  class="form-control"><?php echo set_value('deskripsi'); ?></textarea>
											<?php echo form_error('deskripsi'); ?>
										</div>
									</div>
									<div class="form-group row text-right">
										<div class="col-sm-8 offset-3">
											<button class="btn btn-success" type="submit" name="submit">SIMPAN</button>
											<a href="<?php echo base_url('solusi'); ?>" class="btn btn-secondary">KEMBALI</a>
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
