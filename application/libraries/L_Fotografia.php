<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class L_Fotografia
{
	function __construct() {
		$this->ci =& get_instance();
		$this->ci->load->helper("file");
		$this->ci->load->database();
		$this->ci->load->model('M_DatosSuscriptor');
		$this->ci->load->model('M_DatosIniciarSesionUsuario');
	}

	public function LF_GetFotografiaSuscriptor($hashSuscriptor) {

		$rutaFotografia = "img/coinpinver/Suscriptor/Perfil/Avatar.png";
		$resFotografiaSuscriptor = $this->ci->M_DatosSuscriptor->getFotografiaSuscriptor($hashSuscriptor);
		$idSuscriptor = "";
		$fotoSuscriptor = "NULL";

		foreach($resFotografiaSuscriptor as $fotografiaSuscriptor) {
			$idSuscriptor = $fotografiaSuscriptor->idSuscriptor;
			$fotoSuscriptor = $fotografiaSuscriptor->fotoSuscriptor;
		}

		if(strlen($fotoSuscriptor) >= 1) {
			$urlCRearFotografia = "./Archivos/Fotografias/Suscriptores/verFoto[" . $idSuscriptor . "].jpg";

			if (write_file($urlCRearFotografia, $fotoSuscriptor)) {
				$rutaFotografia = $urlCRearFotografia;
			}
		}

		return base_url($rutaFotografia) . "?v=" . time();
	}
	public function LF_GetFotografiaUsuario($hashUsuario) {

		$rutaFotografia = "img/coinpinver/Suscriptor/Perfil/Avatar.png";
		$resFotografiaSuscriptor = $this->ci->M_DatosIniciarSesionUsuario->getFotografiaUsuario($hashUsuario);
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
}
?>