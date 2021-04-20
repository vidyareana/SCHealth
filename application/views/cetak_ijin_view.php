		<?php require head; ?>
		<style>
			@media print {
				.hide-from-printer{ display:none;}
			}
		</style>
<div id="printarea">
	<div class="col-xs-12" style="margin: 0px 0px 10px 0px;">
		<img src="<?php echo base_url(); ?>kop.png" class="img-responsive">
		<h3><center><b>SURAT IZIN SAKIT SISWA</b></center></h3>
		<br>
		<div class="col-xs-12" style="margin-bottom: 10px;">
			<div class="col-xs-10 col-xs-offset-1">
				<table width="100%">
					<tr>
						<th style="width: 100px;">Nama</th>
						<td style="width: 10px;">:</td>
						<td><?php echo $siswa->nama_siswa; ?></td>
					</tr>
					<tr>
						<th>NIS</th>
						<td>:</td>
						<td><?php echo $siswa->nis; ?></td>
					</tr>
					<tr>
						<th>Kelas</th>
						<td>:</td>
						<td><?php echo $siswa->kelas; ?></td>
					</tr>
					<tr>
						<th>Alasan</th>
						<td>:</td>
						<td><?php echo $siswa->diagnosa; ?><br></td>
					</tr>
					<tr>
						<th>Dokter</th>
						<td>:</td>
						<td><?php echo $dokter->nama_dokter; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<?php
			$date = strtotime($siswa->tgl_periksa);
			$date =  date("d-m-Y", $date);
			$date2 = date("d-m-Y", mktime(0,0,0,date("n"),date("d")+$siswa->istirahat,date("Y")));
		?>
		<?php /*<p>Diberikan istirahat sakit selama <b><?php echo $hari[$siswa->istirahat]; ?></b> ( <b><?php echo $siswa->istirahat; ?> </b>) hari, terhitung mulai tanggal <b><?php echo $date; ?></b> s.d tanggal <b><?php echo $date2; ?></b>.<br>Demikian surat keterangan ini diberikan untuk diketahui dan dipergunakan seperlunya.</p>*/?>
		<div class="col-xs-12">
			<div class="col-xs-10 col-xs-offset-1">
				<br>
					<table><tr><td>Malang, <?php echo date("d")." ".$bulan[date("n")]." ".date("Y"); ?></td></tr></table>
				<table width="100%">
					<tr>
						<td>Guru Piket,</td>
						<td>Guru Pengajar,</td>
						<td>Kepsek/Waka,</td>
					</tr>
					<tr>
						<td><br><br><br><br></td>
						<td><br><br><br><br></td>
						<td><br><br><br><br></td>
					</tr>
					<tr>
						<td>. . . . . . . . . . . . . . . </td>
						<td>. . . . . . . . . . . . . . . </td>
						<td>. . . . . . . . . . . . . . . </td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12">
	<div style="float:right;padding:0px 0px 10px 10px;">
		<input class="hide-from-printer btn btn-primary" type="button" value="Cetak" onclick="printpage()"> &nbsp;&nbsp;
		<a href="javascript:history.go(-1);" class="hide-from-printer"><button class="hide-from-printer btn btn-default" type="button">Kembali</button></a>
	</div>
</div>
<script>
function printpage()
  {
  window.print()
  }
</script>