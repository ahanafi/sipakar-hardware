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
									<a class="wizard-step" href="#one">
										<p class="step-number">1</p>
										<p class="step-details">Informasi Dasar</p>
									</a>
									<a class="wizard-step" href="#two">
										<p class="step-number">2</p>
										<p class="step-details">Pilih Kerusakan</p>
									</a>
									<a class="wizard-step done" href="#three">
										<p class="step-number">3</p>
										<p class="step-details">Hasil Konsultasi</p>
									</a>
								</div>
								<div id="st-wizard-wrapper" class="owl-carousel wizard-slides mt-5">
									<div class="wizard-slide" data-hash="three">
										<div class="row">
											<div class="form-group col-md-2">
												<label class="label text-muted mt-2">Solusi : </label>
											</div>
											<div class="form-group col-md-10">
												<?php echo $kerusakan->solusi; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="wizard-footer">
									<div class="wrapper">
										<input type="hidden" name="order-section" value="LAST-SECTION">
										<p class="mb-0 mr-4 text-muted wizard-slide-count">LANGKAH 3/3</p>
										<button type="submit" name="next" class="btn btn-primary customNextBtn">SELESAI</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
