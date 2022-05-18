<?php
session_start();

if(!DEFINED('BASEPATH')) exit("Error");

class CW_Inicio extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model("M_DatosWhitePaper");
		date_default_timezone_set("America/Mexico_City");

	}
	public function CWI_Principal() {
		
		$titulosWhitePaper = $this->M_DatosWhitePaper->MDWP_Titulos();
				

		$w_resul = $this->M_DatosWhitePaper->MDWP_PrimerRegistro();
		$w_id = $w_resul[0]->w_id;
		$getDescripcion = $this->M_DatosWhitePaper->MDWP_Descripcion($w_id);
		@$descripcion = $getDescripcion[0]->w_contenido;
		@$titulo = $getDescripcion[0]->w_titulo;

		$datos["informacion"] = array("titulosWhitePaper"=>$titulosWhitePaper, "descripcion"=>$descripcion, "titulo"=>$titulo, "w_id"=>$w_id);	
		$datos["ubicacion_vista"] = "/V_WhitePaper/VW_WhitePaper"; 
		$this->load->view("Principal", $datos);
	}
	public function CWI_getDescripcion()
	{
		if($this->input->post())
		{
			$w_id = $_POST['vwwp_id'];
			$getDescripcion = $this->M_DatosWhitePaper->MDWP_Descripcion($w_id);
			$descripcion = $getDescripcion[0]->w_contenido;
			$titulo = $getDescripcion[0]->w_titulo;
			echo '<h3 class="h5">'.$titulo."</h3>";
			echo "<br>";
			echo $descripcion;
		}
	}
	
	public function CWI_SinEstilos() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_WhitePaper/VW_SinEstilos"; 
		$this->load->view("Principal", $datos);
	}
	public function CWI_addTemaWhitePaper()
	{
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_WhitePaper/VW_addTemaWhitePaper"; 
		$this->load->view("Contenido", $datos);	
	}
	public function CWI_saveTemaWhitePaper()
	{
		$titulo = $this->input->post("titulo");
		$contenidoWhitePaper = $this->input->post("contenidoWhitePaper");

		$fechaActual = date("Y-m-d h:m:s");
		
		$valoresWhitePaper = array("w_titulo"=>$titulo, "w_contenido"=>$contenidoWhitePaper, "w_fechaRegistro"=>$fechaActual,"w_estatus"=>"1");
		$insertUsu = $this->M_DatosWhitePaper->MDWP_setContenidoWhitePaper($valoresWhitePaper);
		
		echo '<input type="text" value="'.$insertUsu.'" id="aux_addwp" name="aux_addwp">';
		
	}
	public function CWI_downloadWhitePaper()
	{
	
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_WhitePaper/VW_downloadWhitePaper"; 
		$this->load->view("Contenido", $datos);	
	}
	public function CWI_ModalupdateTemaWhitePaper()
	{
		$w_id = $this->input->post("vwwp_id");
		$getDescripcion = $this->M_DatosWhitePaper->MDWP_Descripcion($w_id);
				
		$datos["informacion"] = array("getDescripcion"=>$getDescripcion);
		$datos["ubicacion_vista"] = "/V_WhitePaper/VW_updateTemaWhitePaper"; 
		$this->load->view("Contenido", $datos);	
	}
	public function CWI_updateTemaWhitePaper()
	{
		$w_id = $this->input->post("w_id");
		$titulo = $this->input->post("titulo");
		$contenidoWhitePaper = $this->input->post("contenidoWhitePaper");

		$fechaActual = date("Y-m-d h:m:s");

		$datosUpdateWhitePaper = array("w_titulo" => $titulo, "w_contenido"=>$contenidoWhitePaper, "w_fechaRegistro"=>$fechaActual);
		$where = array("w_id" => $w_id);
		$banderaUpdate = $this->M_DatosWhitePaper->MDWP_updateContenidoWhitePaper($datosUpdateWhitePaper, $where);
		
		echo '<input type="hidden" value="'.$banderaUpdate.'" id="aux_addwp" name="aux_addwp">';

		// $valoresWhitePaper = array("w_titulo"=>$titulo, "w_contenido"=>$contenidoWhitePaper, "w_fechaRegistro"=>$fechaActual,"w_estatus"=>"1");
		// $insertUsu = $this->M_DatosWhitePaper->MDWP_setContenidoWhitePaper($valoresWhitePaper);
		
		// echo '<input type="hidden" value="'.$insertUsu.'" id="aux_addwp" name="aux_addwp">';
	}
	public function CWI_Prueba() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_WhitePaper/VW_Prueba"; 
		$this->load->view("Contenido", $datos);
	}
}
		      
?>
