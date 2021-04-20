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
				<section class="content-header">
				  <h1>
					Siswa
				  </h1>
				  <ol class="breadcrumb">
					
				  </ol>
				</section>
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
									<h3 class="box-title">Daftar Siswa</h3>
									<span class="pull-right">
										<a href="#" style="color: #dd4b39;" data-toggle="modal" data-target=".tambah" data-backdrop="false"><i class="fa fa-plus fa-lg"></i>  &nbsp;</a>
									</span>
									<div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-body">
													<div class="panel panel-default" style="margin-bottom:0px;">
														<div class="panel-heading">
															<B>Tambah Data</B>
														</div>
														<div class="panel-body"  style="">
															<form action='' method='POST' class="form-horizontal" role="form"> 
																<div class="col-xs-12">
																	<div class="form-group"> 
																		<label class="col-md-4 control-label" >NIS</label> 
																		<div class="col-md-8"> 
																			<input type="text" class="form-control" name="nis" required> 
																		</div> 
																	</div> 
																	<div class="form-group"> 
																		<label class="col-md-4 control-label" >Nama Siswa</label> 
																		<div class="col-md-8"> 
																			<input type="text" class="form-control" name="nama" required> 
																		</div> 
																	</div> 
																	<div class="form-group"> 
																		<label class="col-md-4 control-label" >Kelas</label> 
																		<div class="col-md-8"> 
																			<input type="text" class="form-control" name="kelas" required> 
																		</div> 
																	</div> 
																	<div class="form-group"> 
																		<label class="col-md-4 control-label">Jenis Kelamin</label> 
																		<div class="col-md-8"> 
																			<label class="checkbox-inline"> 
																				<input type="radio" name="kel" id="lakilaki" value="1"> Laki-laki </label> 
																			<label class="checkbox-inline"> 
																				<input type="radio" name="kel" id="perempuan" value="2"> Perempuan </label>
																		</div> 
																	</div> 
																	<div class="form-group"> 
																		<label class="col-md-4 control-label">Alamat</label> 
																		<div class="col-md-8">
																			<textarea class="form-control" rows="3" name="alamat"></textarea>
																		</div> 
																	</div>
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
									</div>
								</div>
								<div class="box-body">
									<div class="col-xs-12">
										<table id="tabel" class="table table-bordered table-striped">
											<thead>
												<tr>
												  <th>NIS</th>
												  <th>Nama Siswa</th>
												  <th>Kelas</th>
												  <th>Jenis Kelamin</th>
												  <th>Alamat</th>
												  <th style="width: 40px;"> </th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no=0;
												foreach ($siswa as $row) { 
													$no = $no + 1;
													if($row->jenis_kelamin=="1"){
														$kel = "Laki-laki";
													} else{
														$kel = "Perempuan";
													}
													echo "<tr>";
													echo "<td>".$row->nis."</td>";
													echo "<td>".$row->nama."</td>";
													echo "<td>".$row->kelas."</td>";
													echo "<td>".$kel."</td>";
													echo "<td>".$row->alamat."</td>";
													echo "<td>";?>
															<button class="btn btn-xs btn-success" data-toggle="modal" data-target=".edit<?php echo $no; ?>" data-backdrop="false"><i class="fa fa-edit"></i></button> &nbsp;
															<button class="btn btn-xs btn-danger" data-toggle="modal" data-target=".hapus<?php echo $no; ?>" data-backdrop="false"><i class="fa fa-trash"></i></button>
															<div class="modal fade hapus<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
																<div class="modal-dialog modal-sm">
																	<div class="modal-content">
																		<div class="modal-body">
																			<div class="panel panel-default" style="margin-bottom:0px;">
																				<div class="panel-heading">
																					<B>Hapus Data</B>
																				</div>
																				<div class="panel-body"  style="">
																					<form action='' method='POST' class="form-horizontal" role="form"> 
																						<div class="col-xs-12">
																							<center>
																							 	Yakin ingin menghapus data <b><?php echo $row->nama; ?></b>??? 
																								<hr>
																								<button type='submit' name='hapus' value="<?php echo $row->nis; ?>" class='btn btn-danger' action=''>Hapus</button>&nbsp; &nbsp;
																								<button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:4px;">Batal</button>
																								<hr>
																							</center>
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal fade edit<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
																<div class="modal-dialog modal-md">
																	<div class="modal-content">
																		<div class="modal-body">
																			<div class="panel panel-default" style="margin-bottom:0px;">
																				<div class="panel-heading">
																					<B>Ubah Data</B>
																				</div>
																				<div class="panel-body"  style="">
																					<form action='' method='POST' class="form-horizontal" role="form"> 
																						<div class="col-xs-12">
																							<div class="col-xs-12 form-group"> 
																								<label class="col-md-4 control-label" >NIS</label> 
																								<div class="col-md-8"> 
																									<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="nis" value="<?php echo $row->nis; ?>" required disabled> 
																								</div> 
																							</div> 
																							<div class="col-xs-12 form-group"> 
																								<label class="col-md-4 control-label" >Nama Siswa</label> 
																								<div class="col-md-8"> 
																									<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="nama" value="<?php echo $row->nama; ?>" required> 
																								</div> 
																							</div> 
																							<div class="col-xs-12 form-group"> 
																								<label class="col-md-4 control-label" >Kelas</label> 
																								<div class="col-md-8"> 
																									<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="kelas" value="<?php echo $row->kelas; ?>" required> 
																								</div> 
																							</div> 
																							<div class="col-xs-12 form-group"> 
																								<label class="col-md-4 control-label">Jenis Kelamin</label> 
																								<div class="col-md-8"> 
																									<label class="checkbox-inline"> 
																										<input type="radio" name="kel" id="lakilaki" <?php if($row->jenis_kelamin=="1"){ echo "checked"; } ?> value="1"> Laki-laki </label> 
																									<label class="checkbox-inline"> 
																										<input type="radio" name="kel" id="perempuan" <?php if($row->jenis_kelamin=="2"){ echo "checked"; } ?> value="2"> Perempuan </label>
																								</div> 
																							</div> 
																							<div class="col-xs-12 form-group"> 
																								<label class="col-md-4 control-label">Alamat</label> 
																								<div class="col-md-8">
																									<textarea class="form-control" rows="3" style="width: 100%;margin-bottom: 15px;margin-top: 15px;" name="alamat"><?php echo $row->alamat; ?></textarea>
																								</div> 
																							</div>
																							<div class="col-xs-12 form-group"> 
																								<div class="col-md-offset-1 col-md-10"> 
																								<center>
																									<hr>
																									<button type='submit' name='simpan' value='<?php echo $row->nis; ?>' class='btn btn-success' action=''>Simpan</button>&nbsp; &nbsp;
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
												<?php
														echo "</td>";
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