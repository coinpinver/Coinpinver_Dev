<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CP_Inicio extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
	}

	public function CPI_Home() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_PlataformaEarn/VP_Inicio"; 
		$this->load->view("Principal", $datos);
	}

}
?>
