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
					Riwayat
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
												foreach ($riwayat as $row) { 
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