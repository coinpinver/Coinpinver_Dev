<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CS_Acciones extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_DatosSuscriptor');

		$this->load->library('L_Seguridad');
		$this->load->library('L_Fotografia');
		$this->l_seguridad->LS_ValidaSesionActiva();
	}

	public function CS_UpdateInformacionPersonalSuscriptor() {
		
		if($this->input->post()) {
			$datosUpdateSuscriptor = array("nombreSuscriptor" => $this->input->post("nombreSuscriptor"),
											"apellidosSuscriptor" => $this->input->post("apellidosSuscriptor"),
											"idSexo" => $this->input->post("idSexo"),
											"telefonoSuscriptor" => $this->input->post("telefonoSuscriptor"),
											"idPais" => $this->input->post("idPais"));
			$where = array("idSuscriptor" => $_SESSION['idSuscriptor']);
			
			$banderaUpdate = $this->M_DatosSuscriptor->updateInformacionPerfil($datosUpdateSuscriptor, $where);

			if($banderaUpdate == 1) {
				echo "<input class='form-control form-control-sm' id='banderaAccionesPerfilSuscriptor' name='banderaAccionesPerfilSuscriptor' value='TRUE' value-action='UPDATE' value-element='DATOS-GENERALES-SUSCRIPTOR' type='hidden'/>";
			} else {
				echo "<input class='form-control form-control-sm' id='banderaAccionesPerfilSuscriptor' name='banderaAccionesPerfilSuscriptor' value='FALSE' value-action='UPDATE' value-element='DATOS-GENERALES-SUSCRIPTOR' type='hidden'/>";
				$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al modificar tu información. Intentalo mas tarde","warning");
			}
		} else {
			redirect("PerfilSuscriptor");
		}
	}

	public function CS_CambiaFotografiaSuscriptor() {

			$imagen_temporal = $_FILES['fotoSuscriptor']['tmp_name'];
			$data=file_get_contents($imagen_temporal);

			$datosUpdateFotografiaSuscriptor = array("fotoSuscriptor" => $data);
			$where = array("idSuscriptor" => $_SESSION['idSuscriptor']);

			$banderaUpdate = $this->M_DatosSuscriptor->updateInformacionPerfil($datosUpdateFotografiaSuscriptor, $where);

			if($banderaUpdate == 1) {
				$_SESSION['rutaFotografiaSuscriptor'] = $this->l_fotografia->LF_GetFotografiaSuscriptor($_SESSION["hashSuscriptor"]);
				echo "<input class='form-control form-control-sm' id='banderaAccionesPerfilSuscriptor' name='banderaAccionesPerfilSuscriptor' value='TRUE' value-action='UPDATE' value-element='FOTOGRAFIA' type='hidden'/>";
			} else {
				echo "<input class='form-control form-control-sm' id='banderaAccionesPerfilSuscriptor' name='banderaAccionesPerfilSuscriptor' value='FALSE' value-action='UPDATE' value-element='FOTOGRAFIA' type='hidden'/>";
				$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al modificar tu información. Intentalo mas tarde","warning");
			}
	}

}
?>
