<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require_once APPPATH."/libraries/PHPExcel.php";
 
	class Excell extends PHPExcel {
		public function __construct() {
			parent::__construct();
		}
	}