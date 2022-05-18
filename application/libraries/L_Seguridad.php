<?php
if ( ! defined("BASEPATH")) exit("No direct script access allowed");    
class L_Seguridad{

	function __construct(){
		$this->ci =& get_instance();
	}

	public function LS_ValidaSesionActiva(){
		if(!isset($_SESSION["ACCESO-COINPINVER"])){
			header("Location: " . base_url("index.php/SinPersimos"));
			exit;
		}
	}
}
?>