<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class L_AdminCursos
{
	function __construct() {
		$this->ci =& get_instance();
		$this->ci->load->helper("file");
		$this->ci->load->database();
		$this->ci->load->model('M_DatosCursos');
	}

	public function LF_GetImagenCurso($hashCurso) {

		$rutaImgCurso = "img/coinpinver/Cursos/noImage.jpg";
		$resImgCurso = $this->ci->M_DatosCursos->getImagenCurso($hashCurso);
		$idCurso = "";
		$imagenCurso = "NULL";

		foreach($resImgCurso as $imgCurso) {
			$idCurso = $imgCurso->idCurso;
			$imagenCurso = $imgCurso->imagenCurso;
		}

		if(strlen($imagenCurso) >= 1) {
			$urlCrearImg = "./Archivos/Cursos/Imagenes/verImg[" . $idCurso . "].jpg";

			if (write_file($urlCrearImg, $imagenCurso)) {
				$rutaImgCurso = $urlCrearImg;
			}
		}

		return base_url($rutaImgCurso) . "?v=" . time();
	}

	public function LF_SetMaterialSesionModulo($materialSesion, $hashCurso, $hashModulo, $hashSesion) {

		$directorioCurso = "./Archivos/Cursos/" . $hashCurso;
		$directorioModulo = $directorioCurso . "/" . $hashModulo;

		if (!file_exists($directorioCurso)) {
			mkdir($directorioCurso, 0777, true);
		}

		if (!file_exists($directorioModulo)) {
			mkdir($directorioModulo, 0777, true);
		}

		$propertiesMateria = pathinfo($materialSesion["name"]);

		$urlMaterialSesion = $directorioModulo . "/" . $hashSesion . "." . $propertiesMateria["extension"];
		
		if (move_uploaded_file($materialSesion["tmp_name"], $urlMaterialSesion)) {
			return $urlMaterialSesion;
		} else {
			return "FAIL-UPLOAD";
		}

	}
}
?>