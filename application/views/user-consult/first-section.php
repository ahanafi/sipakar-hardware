<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-7 col-md-8 mx-auto">
				<div class="card">
					<div class="card-body">
						<form action="<?php echo base_url('konsultasi/submit'); ?>" method="POST">
							<div class="d-sm-flex align-items-center justify-content-between font-weight-bold">
								<img src="<?php echo base_url(); ?>assets/images/ucic.png" alt="logo"
									 style="width: 120px;">
								<p class="mb-0 mt-4 mt-sm-0">
									Silahkan masukkan data di bawah ini...
								</p>
							</div>
							<div class="st-wizard-wrapper">
								<div class="st-wizard-steps">
									<a class="wizard-step done" href="#one">
										<p class="step-number">1</p>
										<p class="step-details">Informasi Umum</p>
									</a>
									<a class="wizard-step" href="#two">
										<p class="step-number">2</p>
										<p class="step-details">Pilih Kerusakan</p>
									</a>
									<a class="wizard-step" href="#three">
										<p class="step-number">3</p>
										<p class="step-details">Hasil Konsultasi</p>
									</a>
								</div>
								<div id="st-wizard-wrapper" class="owl-carousel wizard-slides mt-5">
									<div class="wizard-slide" data-hash="one">
										<div class="row">
											<div class="form-group col-md-4">
												<label class="label text-muted mt-2">Nama <span
															class="text-danger"><b>*</b></span></label>
											</div>
											<div class="form-group col-md-8">
												<input type="text" class="form-control" name="nama" id="nama" required
													   autocomplete="off">
												<?php echo form_error('nama'); ?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-4">
												<label class="label text-muted mt-2">Jenis Perangkat Keras <span
															class="text-danger"><b>*</b></span></label>
											</div>
											<div class="form-group col-md-8">
												<select name="id_perangkat_keras" id="hardware" class="form-control"
														required>
													<option>-- Pilih Jenis Perangkat Keras --</option>
													<?php foreach ($perangkat_keras as $p): ?>
														<option value="<?php echo $p->id_perangkat_keras; ?>">
															<?php echo $p->nama_perangkat_keras; ?>
														</option>
													<?php endforeach; ?>
												</select>
												<?php echo form_error('id_perangkat_keras'); ?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-4">
												<label class="label text-muted mt-2">Merk Perangkat <span
															class="text-danger"><b>*</b></span></label>
											</div>
											<div class="form-group col-md-8">
												<input type="text" name="merk" id="merk" class="form-control" required autocomplete="off">
												<?php echo form_error('merk'); ?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-4">
												<label class="label text-muted mt-2">Tipe <span
															class="text-danger"><b>*</b></span></label>
											</div>
											<div class="form-group col-md-8">
												<input type="text" name="tipe" id="tipe" class="form-control" required
													   autocomplete="off">
												<?php echo form_error('tipe'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="wizard-footer">
									<p class="required-text"><span class="text-danger"><b>*</b></span> Wajib diisi</p>
									<div class="wrapper">
										<input type="hidden" name="order-section" value="FIRST-SECTION">
										<p class="mb-0 mr-4 text-muted wizard-slide-count">LANGKAH 1/3</p>
										<button type="submit" name="next" class="btn btn-primary customNextBtn">
											SELANJUTNYA
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
