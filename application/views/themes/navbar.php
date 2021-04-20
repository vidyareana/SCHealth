		<!----------------------------------------------------- navbar untuk admin ---------------------------------------------------->
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<li class="header"><h4 style="color:#000000">Menu</h4></li>
					<li class="treeview">
						<a href="<?php echo base_url(); ?>beranda/">
							<i class="fa fa-home"></i> <span>Beranda</span>
						</a>
					</li>
					<li class="treeview">
						<a href="<?php echo base_url(); ?>admin/dokter">
							<i class="fa fa-user-md"></i>
							<span>Daftar Dokter</span>
						</a>
					</li>
					<li class="treeview">
						<a href="<?php echo base_url(); ?>admin/siswa">
							<i class="fa fa-users"></i>
							<span>Daftar Siswa</span>
						</a>
					</li>
					<li class="treeview">
						<a href="<?php echo base_url(); ?>admin/obat">
							<i class="fa fa-medkit"></i>
							<span>Daftar Obat</span>
						</a>
					</li>
					<li class="treeview">
						<a href="<?php echo base_url(); ?>admin/riwayat">
							<i class="fa fa-book"></i>
							<span>Riwayat</span>
						</a>
					</li>
					<li class="treeview">
						<a href="#" data-toggle="modal" data-target="#ubah" data-backdrop="false">
							<i class="fa fa-lock"></i>
							<span>Ubah Password</span>
						</a>
					</li>
					<li class="treeview">
						<a href="<?php echo base_url(); ?>beranda/logout">
							<i class="fa fa-sign-out"></i>
							<span>Keluar</span>
						</a>
					</li>
				</ul>
			</section>
		</aside>	
		<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-body">
				<div class="panel panel-danger" style="margin-bottom:0px;">
					<div class="panel-heading">
						<B>Ubah Password</B>
					</div>
					<div class="panel-body"  style="">
						<form action='' method='POST' class="form-horizontal" role="form"> 
							<div class="col-xs-12"> 
								<div class="col-xs-12 form-group"> 
									<label class="col-md-4 control-label" >Password Lama</label> 
									<div class="col-md-8"> 
										<input type="text" class="form-control" style="width: 100%;margin-bottom: 15px;" name="" value="<?php echo $this->Myencrypt->xorcript($user->password, "dec"); ?>" required> 
									</div> 
								</div> 
								<div class="col-xs-12 form-group"> 
									<label class="col-md-4 control-label" >Password Baru</label> 
									<div class="col-md-8"> 
										<input type="password" class="form-control" style="width: 100%;margin-bottom: 15px;" name="password"  required> 
									</div> 
								</div>
								<div class="col-xs-12 form-group"> 
									<div class="col-md-offset-1 col-md-10"> 
									<center>
										<hr>
										<button type='submit' name='simpan_password' value='true' class='btn btn-success' action=''>Simpan</button>&nbsp; &nbsp;
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