<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CC_Principal extends CI_Controller
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

	public function CEP_GetCursosCriptomonedas() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Cursos/VC_Criptomonedas/VCC_ListadoDeCursos"; 
		$this->load->view("Principal", $datos);
	}

	public function CEP_GetDetalleCursoCriptomonedas() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Cursos/VC_Criptomonedas/VCC_DetalledelCurso"; 
		$this->load->view("Principal", $datos);
	}
}
?>
