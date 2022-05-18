<?php
session_start();

if(!DEFINED('BASEPATH')) exit("Error");

class C_Pruebas extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->library("L_Correos");
	}

	public function RecoveryPasswordEmail() {
		$hashSuscriptor = "51a44ce153b055e3793da82412c232dc";
		$this->l_correos->LC_EnviaRecuperaContraseniaSuscriptor($hashSuscriptor);
	}
}
		      
?>
