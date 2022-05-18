<?php
session_start();

if(!DEFINED('BASEPATH')) exit("Error");

class C_Principal extends CI_Controller
{
	public function index() {
		redirect("Inicio");
	}

	public function SinPermiso() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Estructura/VE_NoPermisos"; 
		$this->load->view("Principal", $datos);
	}
}
		      
?>
