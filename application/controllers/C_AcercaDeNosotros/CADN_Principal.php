<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CADN_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
	}


	public function CADNP_AcercaDeNosotros() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_AcercaDeNosotros/VPDN_AcercaDeNosotros"; 
		$this->load->view("Principal", $datos);
	}

}
?>
