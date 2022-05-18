<?php
Class M_DatosCatSesionModulo extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}

	public function getCatSesionModulo($idModulo) {
		$sqlCatSesionModulo = "SELECT idSesionModulo, nombreSesion, urlMaterialSesion, duracionSesion FROM catsesionmodulo WHERE idModulo = ? ORDER BY idSesionModulo ASC";
		return $this->db->query($sqlCatSesionModulo, array($idModulo))->result();
	}

	public function getDatosSesionModulo($idSesionModulo) {
		$sqlDatosSesionModulo = "SELECT idSesionModulo, nombreSesion, urlMaterialSesion, hashSesion, duracionSesion FROM catsesionmodulo WHERE idSesionModulo =  ?";
		return $this->db->query($sqlDatosSesionModulo, array($idSesionModulo))->result();
	}

	public function getExisteSesionModulo($nombreSesion, $idModulo) {
		$sqlSesionModulo = "SELECT idSesionModulo FROM catsesionmodulo WHERE nombreSesion = ? AND idModulo = ? AND estatusSesion  = 1";
		return $this->db->query($sqlSesionModulo, array($nombreSesion, $idModulo))->result();
	}

	public function setSesionModulo($valoresInsert) {
		if($this->db->insert("catsesionmodulo", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function updateSesionModulo($datosUpdateSesionModulo, $where) {
		if($this->db->update("catsesionmodulo", $datosUpdateSesionModulo, $where)) {
			return true;
		} else {
			return false;
		}
	}
}
?>