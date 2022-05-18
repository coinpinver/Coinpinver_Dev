<?php
Class M_DatosSuscripcion extends CI_MODEL
{
	/*para cachar el error $db_error=$this->db->error();
	echo $db_error['code']."<br>";
	echo $db_error['message'];*/
	


	public function __construct() {
		parent::__construct();
		//$this->load->database();
	}

	public function getExisteEmailSuscriptor($emailSuscriptor) {
		$sqlSuscriptor = "SELECT emailSuscriptor FROM datossuscriptor WHERE emailSuscriptor = ?";
		return $this->db->query($sqlSuscriptor, array($emailSuscriptor))->num_rows();
	}

	public function getExisteUsuarioSuscriptor($usuarioSuscriptor) {
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
	}
}
?>