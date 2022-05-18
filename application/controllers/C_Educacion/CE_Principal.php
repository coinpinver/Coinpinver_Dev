<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CE_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		/*$this->load->database();
		$this->load->model('M_DatosSuscriptor');
		$this->load->model('M_DatosCatSexo');
		$this->load->model('M_DatosCatPais');

		$this->load->library('L_Seguridad');
		$this->load->library('L_Fotografia');
		$this->l_seguridad->LS_ValidaSesionActiva();*/
	}

	public function CEP_CrecimientoPersonal() {

		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Educacion/VE_CrecimientoPersonal"; 
		$this->load->view("Principal", $datos);
	}

	public function CEP_Criptomonedas() {
		
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Educacion/VE_Criptomonedas"; 
		$this->load->view("Principal", $datos);
	}
	public function CEP_Educacion()
	{
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Educacion/VE_Educacion"; 
		$this->load->view("Principal", $datos);	
	}
}
?>
