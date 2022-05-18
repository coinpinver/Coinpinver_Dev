<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");
/*Controlador para traer los datos del usuario una vez que se haya logeado*/
class CU_Principal extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->model('M_DatosIniciarSesionUsuario');
		$this->load->model('M_DatosCatPais');
		$this->load->model('M_DatosCatSexo');
		$this->load->library("L_Alertas");
		$this->load->library('L_Fotografia');
	}
	public function CUP_PerfilUsuario()
	{
		if(!isset($_SESSION["ACCESO-COINPINVER"]))
		{
			redirect("IniciarSesion");
			
		}
		$_SESSION["ACCESO-COINPINVER"];
		$_SESSION['idUsuario'];
		$_SESSION['aliasUsuario'];
		$hashUsuario = $_SESSION['hashUsuario'];
		$r_datPer = $this->M_DatosIniciarSesionUsuario->getDatosPerfilUsuario($hashUsuario);
		$idSexo = $r_datPer[0]->idSexo;
		$descripSexo = $r_datPer[0]->descripSexo;
		$idPais = $r_datPer[0]->idPais;
		$descripPais = $r_datPer[0]->descripPais;
		if($descripSexo == "Sin Sexo")
		{
			$idSexo = "";
			$descripSexo = "";
		}
		if($descripPais == "Pais No Especificado")
		{
			
			$idPais = "";
			$descripPais = "";
		}
		$fechaNacimientoUsuario = $r_datPer[0]->fechaNacimientoUsuario;
		$getPais = $this->M_DatosCatPais->getCatPaisGeneral();
		$getSexo = $this->M_DatosCatSexo->getCatSexoGeneral();
		$arrayMenuPerfil = array();

		array_push($arrayMenuPerfil, array("menu" => "Información de perfil", "route" => "#", "icono" => 'ai-file-text'));

		if(isset($_SESSION['Admin']))
		{
			array_push($arrayMenuPerfil, array("menu" => "Usuarios registrados", "route" => "AdminUsuariosRegistrados", "icono" => 'ai-users'));
		}
		
		$datos["informacion"] = array("r_datPer"=>$r_datPer, "pais"=>$getPais, "sexo"=>$getSexo, "idSexo"=>$idSexo, "descripSexo"=>$descripSexo,"idPais"=>$idPais, "descripPais"=>$descripPais, "fechaNacimientoUsuario"=>$fechaNacimientoUsuario, "arrayMenuPerfil"=>$arrayMenuPerfil);
		$datos["ubicacion_vista"] = "/V_Usuario/VU_PerfilUsuario"; 
		$this->load->view("Principal", $datos);
	}
	public function CUP_GuardaPerfilUsuario()
	{
		
		if($this->input->post())
		{
			$username = $_POST['username'];
			$paternoUsuario = $_POST['paternoUsuario'];
			$maternoUsuario = $_POST['maternoUsuario'];
			$fechaNacimientoUsuario = $_POST['fechaNacimientoUsuario'];
			$idSexo = $_POST['idSexo'];
			$idPais = $_POST['idPais'];
			$idUsuario = $_POST['idUsuario'];


			$imagen_temporal = $_FILES['fotoUsuario']['tmp_name'];
			$data=file_get_contents($imagen_temporal);

			
			$getIdDatosUsuario = $this->M_DatosIniciarSesionUsuario->getIdDatosUsuario($idUsuario);
			$hashUsuario = $getIdDatosUsuario[0]->hashUsuario;
			
			$valoresInsertUsuario = array("nombreUsuario" => $username,
						"apPatUsuario" => $paternoUsuario,
						"apMatUsuario" => $maternoUsuario,
						"fechaNacimientoUsuario" => $fechaNacimientoUsuario,
						"idSexo" => $idSexo,
						"idPais" => $idPais,
						"fotoUsuario"=>$data);
			$where = array("idDatosUsuario" => $idUsuario);
			$banderaUsuario = $this->M_DatosIniciarSesionUsuario->UpdateUsuario($valoresInsertUsuario, $where);

			//echo "banderaUsuario -> ".$banderaUsuario;
			if($banderaUsuario == 1)
			{
				//actualizar la foto de perfil $_SESSION['rutaFotografiaUsuario']
				$banderaInsertUsuario = "PERFILACTUALIZADO";
				$campo = "Tu perfil ha sido actualizado correctamente";
				$valorCampo = "";
				$_SESSION['rutaFotografiaUsuario'] = $this->l_fotografia->LF_GetFotografiaUsuario($hashUsuario);
				$datos["informacion"] = array("banderaInsert" => $banderaInsertUsuario,
											"campo" => $campo,
											"valorCampo" => $valorCampo);
				$datos["ubicacion_vista"] = "/V_Usuario/VU_AlertaUsuario"; 
				$this->load->view("Principal", $datos);
				
			}
		}
		else{
			
			redirect("PerfilUsuario");
		}
		
	}
	public function LF_GetFotografiaUsuario($hashUsuario) {

		$rutaFotografia = "img/coinpinver/Suscriptor/Perfil/Avatar.png";
		$resFotografiaSuscriptor = $this->M_DatosIniciarSesionUsuario->getFotografiaUsuario($hashUsuario);
		$idSuscriptor = "";
		$fotoSuscriptor = "NULL";

		foreach($resFotografiaSuscriptor as $fotografiaSuscriptor) {
			$idSuscriptor = $fotografiaSuscriptor->idDatosUsuario;
			$fotoSuscriptor = $fotografiaSuscriptor->fotoUsuario;
		}

		if(strlen($fotoSuscriptor) >= 1) {
			$urlCRearFotografia = "./Archivos/Fotografias/Suscriptores/verFoto[" . $idSuscriptor . "].jpg";

			if (write_file($urlCRearFotografia, $fotoSuscriptor)) {
				$rutaFotografia = $urlCRearFotografia;
			}
		}

		return base_url($rutaFotografia) . "?v=" . time();
	}
	public function CUP_RecuperarPass()
	{
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Usuario/VU_RecuperarPass"; 
		$this->load->view("Principal", $datos);	
	}
	public function CUP_CerrarSesion() {
		session_destroy();
		header('Location: ' . base_url());
	}
}

?>