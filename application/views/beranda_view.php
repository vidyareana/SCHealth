<!DOCTYPE html>
<html>
	<head>
		<?php require head; ?>
	</head>
	<body class="skin-blue hold-transition skin-black-light fixed sidebar-mini">
		<div class="wrapper">
			<?php require app_bar; ?>
			<?php require navbar; ?>
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<center>
								<h2 style="color: #d14045"><b>Welcome to Information System of SCHealth</b></h2><img src="<?php echo base_url(); ?>logo.png" width="270px"></center><br>
						</div>
					</div>
				 	<div class="row">
				 		<div class="col-xs-12">
				 			<div class="row">
				 			<div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          <div class="small-box bg-aqua">
					            <div class="inner">
					              <h3>Dokter</h3>

					              <p>&nbsp;</p>
					            </div>
					            <div class="icon">
					              <i class="fa fa-user-md"></i>
					            </div>
					            <a href="<?php echo base_url(); ?>admin/dokter" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          </div>
					        </div>
					        <div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          <div class="small-box bg-yellow">
					            <div class="inner">
					              <h3>Siswa</h3>

					              <p>&nbsp;</p>
					            </div>
					            <div class="icon">
					              <i class="fa fa-users"></i>
					            </div>
					            <a href="<?php echo base_url(); ?>/admin/siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          </div>
					        </div>
					        <div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          <div class="small-box bg-green">
					            <div class="inner">
					              <h3>Obat</h3>

					              <p>&nbsp;</p>
					            </div>
					            <div class="icon">
					              <i class="fa fa-medkit"></i>
					            </div>
					            <a href="<?php echo base_url(); ?>admin/obat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          </div>
					        </div>
					        <div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          <div class="small-box bg-purple">
					            <div class="inner">
					              <h3>Riwayat</h3>

					              <p> &nbsp;</p>
					            </div>
					            <div class="icon">
					              <i class="fa fa-book"></i>
					            </div>
					            <a href="<?php echo base_url(); ?>admin/riwayat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          </div>
					        </div>
					    </div>
				 		</div>
				  	</div>
				</section>
			  </div>
			  
			<?php require foot; ?>
			<script>
				$(function () {
					$("#tabel").DataTable({
						"paging": true,
						"lengthChange": true,
						"searching": true,
						"ordering": false,
						"info": true,
						"autoWidth": false
					});
				});	
				$(document).ready(function() { 
					$("#select").select2({
						placeholder: "Pilih Guru Pembimbing"
					 }); 
				});
			</script>
		</div>
	</body>
</html>