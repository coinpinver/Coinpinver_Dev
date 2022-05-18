<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class L_Alertas
{
	function __construct() {
		$this->ci =& get_instance();
	}


	public function LA_ShowAlertas($title, $text, $color) {
		$datos["informacion"] = array("title" => $title,
									"text" => $text,
									"color" => $color);
		$datos["ubicacion_vista"] = "/V_Estructura/VE_Alertas"; 
		$this->ci->load->view("Contenido", $datos);
	}
}
?>