<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CPL_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
	}

	public function CPLP_Home() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_PlataformaLEARNING/VPL_Inicio"; 
		$this->load->view("Principal", $datos);
	}

}
?>
