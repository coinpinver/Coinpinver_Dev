<?php
Class M_DatosCursos extends CI_MODEL
{
	/*para cachar el error $db_error=$this->db->error();
	echo $db_error['code']."<br>";
	echo $db_error['message'];*/
	


	public function __construct() {
		parent::__construct();
	}

	public function getExisteCurso($nombreCurso, $idNivelCurso) {
		$sqlCurso = "SELECT idCurso FROM catcurso WHERE nombreCurso = ? AND idNivelCurso = ?";
		return $this->db->query($sqlCurso, array($nombreCurso, $idNivelCurso))->result();
	}

	public function getExisteCursoHash($hashCurso) {
		$sqlCurso = "SELECT idCurso FROM catcurso WHERE hashCurso = ?";
		return $this->db->query($sqlCurso, array($hashCurso))->result();
	}

	public function getDatosGeneralesCurso($hashCurso) {
		$sqlDatosCurso = "SELECT cc.nombreCurso, cc.descripGeneralCurso, cc.descripEspecificaCurso, cc.idNivelCurso, cn.descripNivelCurso, cn.iconoNivelCurso,
					DATE_FORMAT(cc.fechaCreacionCurso, '%d-%m-%Y, %H:%i') AS fechaCreacionCurso, DATE_FORMAT(cc.fechaPublicacionCurso, '%d-%m-%Y %H:%i') AS fechaPublicacionCurso,
					cec.descripEstatusCurso
					FROM catcurso cc
					INNER JOIN catnivelcurso cn ON cc.idNivelCurso = cn.idNivelCurso
					INNER JOIN catestatuscurso cec ON cc.idEstatusCurso = cec.idEstatusCurso
					WHERE cc.hashCurso = ?";
		return $this->db->query($sqlDatosCurso, array($hashCurso))->result();
	}

	public function getImagenCurso($hashCurso) {
		$sqlDatosCurso = "SELECT idCurso, imagenCurso FROM catcurso WHERE hashCurso = ?";
		return $this->db->query($sqlDatosCurso, array($hashCurso))->result();
	}

	public function getCostosCurso($hashCurso) {
		$sqlDatosCurso = "SELECT cc.idDivisa, cd.descripDivisa, cd.abreviaturaDivisa, cc.precioActual, cc.precioAnterior 
						FROM catcurso cc
						INNER JOIN catdivisa cd ON cc.idDivisa = cd.idDivisa
						WHERE cc.hashCurso = ?";
		return $this->db->query($sqlDatosCurso, array($hashCurso))->result();
	}

	


	public function setCursoNuevo($valoresInsert) {
		if($this->db->insert("catcurso", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function updateDatosCurso($datosUpdateCurso, $where) {
		if($this->db->update("catcurso", $datosUpdateCurso, $where)) {
			return true;
		} else {
			$db_error=$this->db->error();
			return "Código: [" . $db_error['code'] . "] -> Error: " . $db_error['message'];
		}
	}

	/*public function getExisteUsuarioSuscriptor($usuarioSuscriptor) {
		$sqlSuscriptor = "SELECT usuarioSuscriptor FROM datossuscriptor WHERE usuarioSuscriptor = ?";
		return $this->db->query($sqlSuscriptor, array($usuarioSuscriptor))->num_rows();
	}

	public function getConfirmaSuscriptor($hashSuscriptor) {
		$sqlDatosSuscriptor = "SELECT dcs.idConfirmaSuscriptor, ds.idSuscriptor, DATE_FORMAT(dcs.fechaVenceCodigo, '%d-%m-%Y %H:%i:00') AS fechaVenceCodigo,
							dcs.codigoSeguridad, dcs.banderaConfirma
							FROM datossuscriptor ds 
							LEFT JOIN datosconfirmasuscriptor dcs ON ds.idSuscriptor = dcs.idSuscriptor
							WHERE ds.hashSuscriptor = ?";
		return $this->db->query($sqlDatosSuscriptor, array($hashSuscriptor))->result();
	}

	public function getdatosGeneralesConfirmaSuscriptor($hashSuscriptor) {
		$sqlDatosGeneralesSuscriptor = "SELECT ds.usuarioSuscriptor, ds.emailSuscriptor, dcs.codigoSeguridad
								FROM datossuscriptor ds 
								INNER JOIN datosconfirmasuscriptor dcs ON ds.idSuscriptor = dcs.idSuscriptor
								WHERE ds.hashSuscriptor = ?";
		return $this->db->query($sqlDatosGeneralesSuscriptor, array($hashSuscriptor))->result();
	}

	public function getExistDatosConfirmaSuscriptor($hashSuscriptor) {
		$sqlExistDatosGeneralesSuscriptor = "SELECT dcs.idConfirmaSuscriptor
										FROM datossuscriptor ds 
										INNER JOIN datosconfirmasuscriptor dcs ON ds.idSuscriptor = dcs.idSuscriptor
										WHERE ds.hashSuscriptor = ?";
		return $this->db->query($sqlExistDatosGeneralesSuscriptor, array($hashSuscriptor))->result();
	}

	public function setSuscripcion($valoresInsert) {
		if($this->db->insert("datossuscriptor", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function setDatosConfirmaSuscriptor($valoresInsert) {
		if($this->db->insert("datosconfirmasuscriptor", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function updateDatosConfirmaSuscriptor($datosUpdateSuscriptor, $where) {
		if($this->db->update("datosconfirmasuscriptor", $datosUpdateSuscriptor, $where)) {
			return true;
		} else {
			return false;
		}
	}*/
}
?>