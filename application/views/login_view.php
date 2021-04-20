<html>
	<head>
		<?php require head; ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/lib/custom/custom_login.css">
	</head>
	<body background="bg.jpeg">
		<div class="row">
			<div class="col-xs-12" style="padding:0px;height:100%;display:table;background-color: rgba(0,0,0,0.4);">
				<div class="col-xs-12" style="margin:auto;height:100%;">
					<div style="display:table;height:100%;width:100%;">
						<div style="display:table-cell;vertical-align:middle;text-align:center;">
							<div class="col-lg-12">
								<div class="col-sm-4 col-sm-offset-4 form-box">
									
									<div class="form-top shadow">
										<div class="col-xs-12">
											<center>
												<img src="<?php echo base_url(); ?>logo.png" width="90px" style="margin: 20px;margin-right: 5px;">
												<img src="<?php echo base_url(); ?>logo2.png" height="40px" style=" ">
											</center>
												<?php 
													echo $eror; 
													$this->session->set_userdata('pesan', " ");

												?>
										</div>

												<form action='' method='POST' class="login-form" role="form"> 
													<div class="form-group">
														<label class="control-label">Username</label>
														<input type="text" name="username"  class="form-username form-control" id="form-username">
													</div>
													<div class="form-group" style="margin-bottom: 5px">
														<label class="control-label">Password</label>
														<input type="password" name="password"  class="form-password form-control" id="form-password">
													</div><BR>
													<button style="float:right" type="submit" class="btn btn-primary" name="login" value="true">Login  <i class="fa fa-sign-in"></i></button><br>
												</form><br>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>dist/css/lib/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/morris/morris.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.full.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
			<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</body>
</html>