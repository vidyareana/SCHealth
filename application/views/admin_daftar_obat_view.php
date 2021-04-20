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
					Obat
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
									<h3 class="box-title">Daftar Obat</h3>
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
																		<label class="col-md-4 control-label" >Nama Obat</label> 
																		<div class="col-md-8"> 
																			<input type="text" class="form-control" name="nama" required> 
																		</div> 
																	</div> 
																	<div class="form-group"> 
																		<label class="col-md-4 control-label" >Jumlah Obat</label> 
																		<div class="col-md-8"> 
																			<input type="number" class="form-control" name="jumlah" required> 
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
												  <th style="width: 10px;">No</th>
												  <th>Nama Obat</th>
												  <th>Stok</th>
												  <th style="width: 40px;"> </th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no=0;
												foreach ($obat as $row) { 
													$no = $no + 1;
													echo "<tr>";
													echo "<td>".$no."</td>";
													echo "<td>".$row->nama."</td>";
													echo "<td>".$row->stok."</td>";
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
																							<button type='submit' name='hapus' value="<?php echo $row->id_obat; ?>" class='btn btn-danger' action=''>Hapus</button>&nbsp; &nbsp;
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
																							<label class="col-md-4 control-label" >Nama Obat</label> 
																							<div class="col-md-8"> 
																								<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="nama" value="<?php echo $row->nama; ?>" required > 
																							</div> 
																						</div> 
																						<div class="col-xs-12 form-group"> 
																							<label class="col-md-4 control-label" >Jumlah Obat</label> 
																							<div class="col-md-8"> 
																								<input type="number" class="form-control" style="width: 100%;margin-bottom: 15px;" name="stok" value="<?php echo $row->stok; ?>" required> 
																							</div> 
																						</div> 
																						<div class="col-xs-12 form-group"> 
																							<div class="col-md-offset-1 col-md-10"> 
																							<center>
																								<hr>
																								<button type='submit' name='simpan' value='<?php echo $row->id_obat; ?>' class='btn btn-success' action=''>Simpan</button>&nbsp; &nbsp;
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