<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CS_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_DatosSuscriptor');
		$this->load->model('M_DatosCatSexo');
		$this->load->model('M_DatosCatPais');

		$this->load->library('L_Seguridad');
		$this->load->library('L_Fotografia');
		$this->l_seguridad->LS_ValidaSesionActiva();
	}

	public function CS_showPerfilSuscriptor() {
		
		$hashSuscriptor = $_SESSION['hashSuscriptor'];
		$resDatosSuscriptor = $this->M_DatosSuscriptor->getDatosGeneralesSuscriptor($hashSuscriptor);
		
		if(count($resDatosSuscriptor) >= 1) {
			$datosSuscriptor["nombreSuscriptor"] = $resDatosSuscriptor[0]->nombreSuscriptor;
			$datosSuscriptor["apellidosSuscriptor"] = $resDatosSuscriptor[0]->apellidosSuscriptor;
			$datosSuscriptor["emailSuscriptor"] = $resDatosSuscriptor[0]->emailSuscriptor;
			$datosSuscriptor["usuarioSuscriptor"] = $resDatosSuscriptor[0]->usuarioSuscriptor;
			$datosSuscriptor["idSexo"] = $resDatosSuscriptor[0]->idSexo;
			$datosSuscriptor["descripSexo"] = $resDatosSuscriptor[0]->descripSexo;
			$datosSuscriptor["telefonoSuscriptor"] = $resDatosSuscriptor[0]->telefonoSuscriptor;
			$datosSuscriptor["idPais"] = $resDatosSuscriptor[0]->idPais;
			$datosSuscriptor["descripPais"] = $resDatosSuscriptor[0]->descripPais;
			
			$resCatSexo = $this->M_DatosCatSexo->getCatSexoGeneral();
			$datosCatSexo = array();
			$x = 0;

			foreach($resCatSexo as $colCatSexo) {
				$select = "";
				$datosCatSexo[$x]["idSexo"] = $colCatSexo->idSexo;
				$datosCatSexo[$x]["descripSexo"] = $colCatSexo->descripSexo;

				if($colCatSexo->idSexo == $datosSuscriptor["idSexo"]) {
					$select = "selected='selected'";
				}

				$datosCatSexo[$x]["select"] = $select;
				$x++;
			}

			$resCatPais = $this->M_DatosCatPais->getCatPaisGeneral();
			$datosCatPais = array();
			$y = 0;

			foreach($resCatPais as $colCatPais) {
				$select = "";
				$datosCatPais[$y]["idPais"] = $colCatPais->idPais;
				$datosCatPais[$y]["clavePais"] = $colCatPais->clavePais;
				$datosCatPais[$y]["descripPais"] = $colCatPais->descripPais;

				if($colCatPais->idPais == $datosSuscriptor["idPais"]) {
					$select = "selected='selected'";
				}
				$datosCatPais[$y]["select"] = $select;
				$y++;
			}
			
			$_SESSION['rutaFotografiaSuscriptor'] = $this->l_fotografia->LF_GetFotografiaSuscriptor($hashSuscriptor);

			$datos["informacion"] = array("datosSuscriptor" => $datosSuscriptor,
										"datosCatSexo" => $datosCatSexo,
										"datosCatPais" => $datosCatPais);
			$datos["ubicacion_vista"] = "/V_Suscriptor/VS_PerfilSuscriptor"; 
			$this->load->view("Principal", $datos);
		} else {
			$datos["informacion"] = array();
			$datos["ubicacion_vista"] = "/V_Suscriptor/VS_NoPerfilSuscriptor"; 
			$this->load->view("Principal", $datos);
		}
	}
}
?>
