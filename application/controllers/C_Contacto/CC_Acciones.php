<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CC_Acciones extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->model('M_DatosContacto');
	}

	public function CCA_SetDatosContacto() {
		if($this->input->post()) {

			$valoresInsert = array('nombreContacto' => $this->input->post("nombreContacto"),
								'emailContacto' => $this->input->post("emailContacto"),
								'mensajeContacto' => $this->input->post("mensajeContacto"));

			$banderaInsert = $this->M_DatosContacto->setDatosContacto($valoresInsert);

			$datos["informacion"] = array("banderaInsert" => $banderaInsert,
										"nombreContacto" => $this->input->post("nombreContacto"),
										"emailContacto" => $this->input->post("emailContacto"));
			$datos["ubicacion_vista"] = "/V_Contacto/VC_ContactoGuardado"; 
			$this->load->view("Principal", $datos);
		} else {
			redirect("Inicio");
		}
	}

}
?>
