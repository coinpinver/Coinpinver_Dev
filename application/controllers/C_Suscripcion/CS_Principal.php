<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CS_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_DatosSuscriptor');
		$this->load->model('M_DatosSuscripcion');
	}

	public function CSP_CapturaSuscripcion() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Suscripcion/VS_CapturaSuscripcion"; 
		$this->load->view("Principal", $datos);
	}

	public function CSP_ConfirmarCuentaSuscriptor($hashSuscriptor) {


		$resDatosSuscriptor = $this->M_DatosSuscriptor->getDatosGeneralesSuscriptor($hashSuscriptor);
		
		if(count($resDatosSuscriptor) >= 1) {
			
			$resDatosConfirmaSuscriptor = $this->M_DatosSuscripcion->getConfirmaSuscriptor($hashSuscriptor);
			
			if(count($resDatosConfirmaSuscriptor) >= 1) {
				
				if($resDatosConfirmaSuscriptor[0]->banderaConfirma != null) {

					$banderaConfirma = $resDatosConfirmaSuscriptor[0]->banderaConfirma;
				} else {
					$banderaConfirma = 0;
				}
			} else {
				$banderaConfirma = 0;
			}

			$datosSuscriptor["nombreSuscriptor"] = $resDatosSuscriptor[0]->nombreSuscriptor;

			$datos["informacion"] = array("hashSuscriptor" => $hashSuscriptor,
										"datosSuscriptor" => $datosSuscriptor,
										"banderaConfirma" => $banderaConfirma);
			$datos["ubicacion_vista"] = "/V_Suscripcion/VS_ConfirmaCuentaSuscriptor"; 
			$this->load->view("Principal", $datos);
			
		} else {
			
			echo "mil disculpas, estamos en servicio";
			/*$datos["informacion"] = array();
			$datos["ubicacion_vista"] = "/V_Suscriptor/VS_NoPerfilSuscriptor"; 
			$this->load->view("Principal", $datos);*/
		}

	}


	

}
?>
