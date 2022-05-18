<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CT_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
	}

	public function CTP_Principal() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Tienda/VT_Principal"; 
		$this->load->view("Principal", $datos);
	}

}
?>
