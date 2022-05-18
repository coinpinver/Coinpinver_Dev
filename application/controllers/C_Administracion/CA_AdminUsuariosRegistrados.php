<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");
/*Controlador para traer los datos del usuario una vez que se haya logeado*/
class CA_AdminUsuariosRegistrados extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->library("L_Alertas");
		$this->load->library('L_Fotografia');
		$this->load->model("M_AdminUsuariosRegistrados");
		$this->load->library('L_Seguridad');
	}
	public function CAA_AdminUsuariosRegistrados()
	{
		$this->l_seguridad->LS_ValidaSesionActiva();
		$r_usureg = $this->M_AdminUsuariosRegistrados->MAUR_RegistradosCoinpinver();
		$arrayNumPais = array();
		$arrayDescPais = array();
		$idPaisAux = "";
		
		$r_usuregPais = $this->M_AdminUsuariosRegistrados->MAUR_RegistradosPorPais();

		$datos["informacion"] = array("titulo"=>"Usuarios registrados en las plataformas", "r_usureg"=>$r_usureg, "r_usuregPais"=>$r_usuregPais);
		$datos["ubicacion_vista"] = "/V_Administracion/VA_AdminUsuariosRegistrados/VAA_AdminUsuariosRegistrados"; 
		$this->load->view("Contenido2", $datos);

	}
	public function contarValoresArray($array)
	{
		/*Funcion para contar los datos repetidos en un array*/
		$contar=array();
 
		foreach($array as $value)
		{
			
			if(isset($contar[$value]))
			{
				// si ya existe, le añadimos uno
				$contar[$value]+=1;
			}else{
				// si no existe lo añadimos al array
				$contar[$value]=1;
			}
		}
		return $contar;
	}
}

?>