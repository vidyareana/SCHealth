<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0
				</div>
				SMK Telkom Malang &copy; 2017  
			</footer>
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
			<script>
				$(document).ready(function() {
					var url = window.location;
					var element = $('ul.treeview-menu a').filter(function() {
						return this.href == url;
					}).parent().addClass('active').parent().parent().addClass(' active').parent().parent().addClass(' active');
					var element = $('ul.treeview-menu a').filter(function() {
						return this.href == url;
					}).parent().addClass('active').parent().parent().addClass(' active');
					var element = $('ul.sidebar-menu a').filter(function() {
						return this.href == url;
					}).parent().addClass('active');
				});
				
				
			</script>
