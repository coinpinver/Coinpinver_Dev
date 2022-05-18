<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CIS_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
	}

	public function CISP_IniciarSesion() {
		if(isset($_SESSION["ACCESO-COINPINVER"])){
			redirect("PerfilSuscriptor");
		} else {
			$datos["informacion"] = array();
			$datos["ubicacion_vista"] = "/V_IniciarSesion/VIS_IniciarSesion"; 
			$this->load->view("Principal", $datos);
		}
	}

	public function CISP_RepcuperarContrasenia() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_IniciarSesion/VIS_RecuperarContrasenia"; 
		$this->load->view("Principal", $datos);
	}

	public function CISP_CerrarSesion() {
		session_destroy();
		header('Location: ' . base_url());
	}
}
?>
