<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-7 col-md-8 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="d-sm-flex align-items-center justify-content-between font-weight-bold">
							<img src="<?php echo base_url(); ?>assets/images/ucic.png" alt="logo" style="width: 120px;">
							<p class="mb-0 mt-4 mt-sm-0">
								Silahkan masukkan data di bawah ini...
							</p>
						</div>
						<div class="st-wizard-wrapper">
							<div class="st-wizard-steps">
								<a class="wizard-step done" href="#one">
									<p class="step-number">1</p>
									<p class="step-details">Informasi Dasar</p>
								</a>
								<a class="wizard-step" href="#two">
									<p class="step-number">2</p>
									<p class="step-details">Personal<br>Information</p>
								</a>
								<a class="wizard-step" href="#three">
									<p class="step-number">3</p>
									<p class="step-details">Hasil</p>
								</a>
							</div>
							<div id="st-wizard-wrapper" class="owl-carousel wizard-slides mt-5">
								<div class="wizard-slide" data-hash="one">
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-2">Nama <span class="text-danger"><b>*</b></span></label>
										</div>
										<div class="form-group col-md-8">
											<input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-2">Jenis Perangkat Keras <span class="text-danger"><b>*</b></span></label>
										</div>
										<div class="form-group col-md-8">
											<select name="id_perangkat_keras" id="hardware" class="form-control" required>
												<option>-- Pilih Jenis Perangkat Keras --</option>
												<?php foreach ($perangkat_keras as $p):?>
													<option value="<?php echo $p->id_perangkat_keras; ?>">
														<?php echo $p->nama_perangkat_keras; ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-2">Merk Perangkat <span class="text-danger"><b>*</b></span></label>
										</div>
										<div class="form-group col-md-8">
											<input type="text" name="merk" id="merk" class="form-control" required>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-2">Tipe <span class="text-danger"><b>*</b></span></label>
										</div>
										<div class="form-group col-md-8">
											<input type="text" name="tipe" id="tipe" class="form-control" required autocomplete="off">
										</div>
									</div>
								</div>
								<div class="wizard-slide" data-hash="two">
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-2">Full Name*</label>
										</div>
										<div class="form-group col-md-8">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-2">Gender*</label>
										</div>
										<div class="form-group col-md-8">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-2">Location*</label>
										</div>
										<div class="form-group col-md-8">
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="wizard-slide" data-hash="three">
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mb-0">Email*</label>
										</div>
										<div class="form-group col-md-8">
											<p class="font-weight-bold mb-0">lowe.stacy@stiedemann.info</p>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-0 mb-0">Username*</label>
										</div>
										<div class="form-group col-md-8">
											<p class="font-weight-bold mb-0">Derrick Turner</p>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-0 mb-0">Password*</label>
										</div>
										<div class="form-group col-md-8">
											<p class="font-weight-bold mb-0">****** ****</p>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-0 mb-0">Full Name*</label>
										</div>
										<div class="form-group col-md-8">
											<p class="font-weight-bold mb-0">Derrick Turner alex</p>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-0 mb-0">Male*</label>
										</div>
										<div class="form-group col-md-8">
											<p class="font-weight-bold mb-0">Male</p>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label class="label text-muted mt-0 mb-0">Location*</label>
										</div>
										<div class="form-group col-md-8">
											<p class="font-weight-bold mb-0">New Caledonia</p>
										</div>
									</div>
								</div>
							</div>
							<div class="wizard-footer">
								<div class="form-check terms-checkbox">
									<label class="form-check-label">
										<input type="checkbox" class="form-check-input">I have read & agreed to
										the terms of service & policy<i class="input-helper"></i></label>
								</div>
								<p class="required-text"><span class="text-danger"><b>*</b></span> field are required to be filled</p>
								<div class="wrapper">
									<p class="mb-0 mr-4 text-muted wizard-slide-count">STEP 1/3</p>
									<button type="button" class="btn btn-primary customNextBtn">Proceed</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
