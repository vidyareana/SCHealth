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
						</div>
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					          <ul class="nav navbar-nav">
					            <li class=""><a href="<?php echo base_url(); ?>beranda" style="border: 0px;">Beranda</a></li>
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
							Riwayat Pemeriksaan
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
										<h3 class="box-title">Daftar Pasien</h3>
									</div>
									<div class="box-body">
										<div class="col-xs-12">
											<table id="tabel" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th style="width: 40px;">No</th>
														<th>Nama Siswa</th>
														<th>Tanggal Periksa</th>
														<th>Keluhan</th>
														<th>Diagnosa</th>
														<th>Obat</th>
														<th>Istirahat</th>
														<th style="width: 40px;"> </th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no=0;
													foreach ($periksa as $row) { 
														$no = $no + 1;
														$date = strtotime($row->tgl_periksa);
														$date =  date("d-m-Y", $date);
														echo "<tr>";
														echo "<td>".$no."</td>";
														echo "<td>".$row->nama_siswa."</td>";
														echo "<td>".$date."</td>";
														echo "<td>".$row->keluhan."</td>";
														echo "<td>".$row->diagnosa."</td>";
														echo "<td>";
														if($diberi[$row->nis][$row->tgl_periksa]==NULL){
															echo $row->tindak_lanjut."<sub>(Tindak lanjut)</sub>";
														} else{
															foreach ($diberi[$row->nis][$row->tgl_periksa] as $row2) {
																echo $row2->nama_obat.", ";
															}
														}
														echo "</td>";
														echo "<td>".$row->istirahat." hari</td>";
														echo "<td>"; ?>
														<a href="<?php echo base_url(); ?>beranda/cetak/<?php echo $row->id_periksa; ?>/<?php echo $row->tgl_periksa; ?>"><button class="btn btn-xs btn-primary"><i class="fa fa-print"></i></button></a>
													<?php
														"</td>";
														echo "</tr>";
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div> 
							</div>
						</div>
					</section>
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
				</script>
		</div>
	</body>
</html>