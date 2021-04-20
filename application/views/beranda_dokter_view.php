<!DOCTYPE html>
<html>
	<head>
		<?php require head; ?>
	</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black-light layout-top-nav">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<a href="" class="navbar-brand"><img src="<?php echo base_url(); ?>logo2.png" height="25px" style=""></a> 
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
						</div>
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					          <ul class="nav navbar-nav">
					            <li class=""><a href="<?php echo base_url(); ?>dokter/riwayat" style="border: 0px;">Riwayat Pemeriksaan</a></li>
					          </ul>
					        </div>
							<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->nama_dokter; ?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#" data-toggle="modal" data-target="#profile" data-backdrop="false">Profile</a></li>
										<li><a href="<?php echo base_url(); ?>beranda/logout">Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
						
					<!-- /.navbar-custom-menu -->
					</div>

				<!-- /.container-fluid -->
				</nav>
			</header>
		<!-- Full Width Column -->
			<div class="content-wrapper">
				<div class="container">
			<!-- Content Header (Page header) -->
					<section class="content-header">
						<h1>
							Beranda Dokter
							<small> </small>
						</h1>
					</section>
			<!-- Main content -->
					<section class="content">
						<div class="row">

							<div class="col-xs-12">
								<?php 
								echo $pesan; 
								$this->session->set_userdata('pesan', " ");
								?>
							</div>
						</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="box box-danger">
								<div class="box-header with-border">
									<h3 class="box-title">Periksa Pasien</h3>
								</div>
								<div class="box-body">
									<div class="col-xs-12">
										<form action='' method='POST' class="form-horizontal" role="form"> 
											<div class="col-xs-12">
												<div class="form-group"> 
													<label class="col-md-3 control-label" >Nama Siswa</label> 
													<div class="col-md-8"> 
														<select class="form-control select2" style="width: 100%;" name="nis">
															<option value=''> </option>
														<?php
														foreach ($siswa as $row) { 
															echo "<option value='".$row->nis."'>".$row->nama."</option>";
														}
														?>
														</select>
													</div> 
												</div> 
												<div class="form-group"> 
													<label class="col-md-3 control-label">Keluhan</label> 
													<div class="col-md-8">
														<input type="text" class="form-control" name="keluhan" required> 
													</div> 
												</div>
												<div class="form-group"> 
													<label class="col-md-3 control-label" >Diagnosa</label> 
													<div class="col-md-8"> 
														<input type="text" class="form-control" name="diagnosa" required> 
													</div> 
												</div> 
												<div class="form-group"> 
													<label class="col-md-3 control-label" >Tindak Lanjut</label> 
													<div class="col-md-8"> 
														<input type="text" class="form-control" name="tindak_lanjut" required> 
													</div> 
												</div> 
												<div class="form-group"> 
													<label class="col-md-3 control-label" >Butuh Istirahat</label> 
													<div class="col-md-2"> 
														<input type="number" class="form-control" min="0" max="7" name="istirahat"> 
													</div> 
													<label class="col-md-1 control-label" style="text-align: left">Hari</label> 
												</div> 
												<div class="form-group"> 
													<label class="col-md-3 control-label" >Obat</label> 
													<div class="col-md-3"> 
														<select class="form-control" id="obat" style="width: 100%;" name="obat[]">
															<option value=''> </option>
														<?php
														foreach ($obat as $row2) { 
															if($row2->stok==0){

															} else{
															echo "<option value='".$row2->id_obat."'>".$row2->nama_obat."</option>";
															}
														}
														?>
														</select>
													</div> 
													<label class="col-md-1 control-label" >Jumlah</label> 
													<div class="col-md-2"> 
														<input type="number" min="0" class="form-control" name="jumlah[]"> 
													</div> 
													<div class="col-md-2">
														<button type='button' class='btn btn-primary' onclick="plus()"> <i class="fa fa-plus"></i></button> &nbsp;&nbsp;&nbsp;&nbsp;
														<button type='button' class='btn btn-danger' onclick="minus()"> <i class="fa fa-minus"></i></button>
													</div>
												</div> 
												<div id="obat1"></div>
												<div class="form-group"> 
													<div class="col-md-offset-1 col-md-10"> 
													<center>
														<hr>
														<button type='submit' name='tambah' value='true' class='btn btn-primary' action=''> Tambah </button>&nbsp; &nbsp;
														<button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:4px;">Batal</button>
														<hr>
													</center>
													</div> 
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<!-- /.content -->
			<!-- /.container -->
			</div>
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-body">
				<div class="panel panel-danger" style="margin-bottom:0px;">
					<div class="panel-heading">
						<B>Profile</B>
					</div>
					<div class="panel-body"  style="">
						<form action='' method='POST' class="form-horizontal" role="form"> 
							<div class="col-xs-12">
								<div class="col-xs-12 form-group"> 
									<label class="col-md-4 control-label" >Nama Dokter</label> 
									<div class="col-md-8"> 
										<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="nama" value="<?php echo $user->nama_dokter; ?>" required> 
									</div> 
								</div> 
								<div class="col-xs-12 form-group"> 
									<label class="col-md-4 control-label">Jenis Kelamin</label> 
									<div class="col-md-8"> 
										<label class="checkbox-inline"> 
											<input type="radio" name="kel" id="lakilaki" <?php if($user->jenis_kelamin=="1"){ echo "checked"; } ?> value="1"> Laki-laki </label> 
										<label class="checkbox-inline"> 
											<input type="radio" name="kel" id="perempuan" <?php if($user->jenis_kelamin=="2"){ echo "checked"; } ?> value="2"> Perempuan </label>
									</div> 
								</div> 
								<div class="col-xs-12 form-group"> 
									<label class="col-md-4 control-label">Alamat</label> 
									<div class="col-md-8">
										<textarea class="form-control" users="3" style="width: 100%;margin-bottom: 15px;margin-top: 15px;" name="alamat"><?php echo $user->alamat; ?></textarea>
									</div> 
								</div>
								<div class="col-xs-12 form-group"> 
									<label class="col-md-4 control-label" >Username</label> 
									<div class="col-md-8"> 
										<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="username" value="<?php echo $user->username; ?>" required> 
									</div> 
								</div> 
								<div class="col-xs-12 form-group"> 
									<label class="col-md-4 control-label" >Password</label> 
									<div class="col-md-8"> 
										<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="password" value="<?php echo $this->Myencrypt->xorcript($user->password, "dec"); ?>" required> 
									</div> 
								</div> 
								<div class="col-xs-12 form-group"> 
									<div class="col-md-offset-1 col-md-10"> 
									<center>
										<hr>
										<button type='submit' name='simpan' value='<?php echo $user->id_dokter; ?>' class='btn btn-success' action=''>Simpan</button>&nbsp; &nbsp;
										<button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:4px;">Batal</button>
										<hr>
									</center>
									</div> 
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
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
				$(".select2").select2({
					placeholder: "Pilih Siswa"
				 }); 
			});
			$(document).ready(function() { 
				$("#obat").select2({
					placeholder: "Pilih Obat"
				 }); 
			});
			var i = 1;
			function plus(){
				i = i + 1;
				$("#obat1").append("<div id='obat"+i+"'><div class='form-group'><label class='col-md-3 control-label' >Obat</label><div class='col-md-3'><select class='form-control' id='obat' style='width: 100%;' name='obat[]'><option value=''> </option><?php foreach ($obat as $row2) {?><option value='<?php echo $row2->id_obat; ?>'><?php echo $row2->nama_obat; ?></option><?php } ?></select></div> <label class='col-md-1 control-label' >Jumlah</label> <div class='col-md-2'> <input type='number' min='0' class='form-control' name='jumlah[]'> </div></div></div>");
			}
			function minus(){
				if(i==1){

				} else{
					$("#obat"+i).remove();
					i = i - 1;
				}
			}
		</script>
		</div>
	</body>
</html>