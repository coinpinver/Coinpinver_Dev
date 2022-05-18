<?php
Class M_DatosIniciarSesion extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}

	public function getExisteUsuarioPassword($usuarioSuscriptor, $emailSuscriptor) {
		$sqlDatosSuscriptor = "SELECT idSuscriptor FROM datossuscriptor WHERE (usuarioSuscriptor = ? OR emailSuscriptor = ?) AND contraseniaSuscriptor = MD5(?)";
		return $this->db->query($sqlDatosSuscriptor, array($usuarioSuscriptor, $usuarioSuscriptor, $emailSuscriptor))->num_rows();
	}

	public function getDatosSuscriptor($usuarioSuscriptor, $emailSuscriptor) {
		$sqlDatosSuscriptor = "SELECT ds.idSuscriptor, ds.usuarioSuscriptor, ds.hashSuscriptor, dcs.banderaConfirma
								FROM datossuscriptor ds
								LEFT JOIN datosconfirmasuscriptor dcs ON ds.idSuscriptor = dcs.idSuscriptor
								WHERE (ds.usuarioSuscriptor = ? OR ds.emailSuscriptor = ?) 
								AND ds.contraseniaSuscriptor = MD5(?)";
		return $this->db->query($sqlDatosSuscriptor, array($usuarioSuscriptor, $usuarioSuscriptor, $emailSuscriptor))->result();
	}
	public function getUsuarioRecoveryPassword($mailUser) {
		$sqlDatosRecoveryPasswordSuscriptor = "SELECT du.idDatosUsuario, drcu.idRestaurarContrasenia, drcu.banderaRecovery, du.hashUsuario FROM 
			datosusuario du
			left join datosrecuperacontraseniausuario drcu on drcu.idDatosUsuario = du.idDatosUsuario
			left join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			where du.emailUsuario = ? or ca.userControlUsuario = ?
			order by idRestaurarContrasenia desc 
			limit 1";
		return $this->db->query($sqlDatosRecoveryPasswordSuscriptor, array($mailUser, $mailUser))->result();
	}
	public function setDatosRecuperaContraseniaUsuario($valoresInsert) {
		if($this->db->insert("datosrecuperacontraseniausuario", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}
	public function updateDatosRecuperaContraseniaUsuario($datosUpdateUsuario, $where) {
		if($this->db->update("datosrecuperacontraseniausuario", $datosUpdateUsuario, $where)) {
			return true;
		} else {
			return false;
		}
	}
	public function getExisteCodigoSeguridadRecoveryPasswordUsuario($codigoSeguridad, $mailUser) {
		$sqlExisteCodigoSeguridad = "
			SELECT drcu.idRestaurarContrasenia,du.idDatosUsuario, DATE_FORMAT(drcu.fechaVenceCodigo, '%d-%m-%Y %H:%i:00') AS fechaVenceCodigo
			FROM datosusuario du
			INNER JOIN datosrecuperacontraseniausuario drcu on drcu.idDatosUsuario = du.idDatosUsuario
			left join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			WHERE drcu.codigoSeguridad = ?
			AND (du.emailUsuario = ? OR ca.userControlUsuario = ?)
			AND drcu.banderaRecovery = 0";
		return $this->db->query($sqlExisteCodigoSeguridad, array($codigoSeguridad, $mailUser, $mailUser))->result();
	}
	public function updateInformacionPerfil($datosUpdateUsuario, $where) {
		if($this->db->update("controlacceso", $datosUpdateUsuario, $where)) {
			return true;
		} else {
			return false;
		}
	}
	public function getdatosGeneralesRecoveryPasswordUsuario($hashUsuario) {
		$sqlDatosGeneralesUsuario = "SELECT ca.userControlUsuario, du.emailUsuario, drcu.codigoSeguridad
			FROM datosusuario du 
			INNER JOIN datosrecuperacontraseniausuario drcu ON du.idDatosUsuario = drcu.idDatosUsuario
			left join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			WHERE du.hashUsuario = ?
			AND drcu.banderaRecovery = 0";
		return $this->db->query($sqlDatosGeneralesUsuario, array($hashUsuario))->result();
	}
	public function getSuscriptorRecoveryPassword($mailUser) {
		$sqlDatosRecoveryPasswordSuscriptor = "SELECT ds.idSuscriptor, drcs.idRestaurarContrasenia, drcs.banderaRecovery, ds.hashSuscriptor
								FROM datossuscriptor ds
								LEFT JOIN datosrecuperacontraseniasuscriptor drcs ON ds.idSuscriptor = drcs.idSuscriptor
								WHERE ds.emailSuscriptor = ? OR ds.usuarioSuscriptor = ?
								ORDER BY idRestaurarContrasenia DESC
								LIMIT 1";
		return $this->db->query($sqlDatosRecoveryPasswordSuscriptor, array($mailUser, $mailUser))->result();
	}

	public function getExisteCodigoSeguridadRecoveryPasswordSuscriptor($codigoSeguridad, $mailUser) {
		$sqlExisteCodigoSeguridad = "SELECT drcs.idRestaurarContrasenia, ds.idSuscriptor, DATE_FORMAT(drcs.fechaVenceCodigo, '%d-%m-%Y %H:%i:00') AS fechaVenceCodigo
									FROM datossuscriptor ds
									INNER JOIN datosrecuperacontraseniasuscriptor drcs ON ds.idSuscriptor = drcs.idSuscriptor
									WHERE drcs.codigoSeguridad = ?
									AND (ds.emailSuscriptor = ? OR ds.usuarioSuscriptor = ?)
									AND drcs.banderaRecovery = 0";
		return $this->db->query($sqlExisteCodigoSeguridad, array($codigoSeguridad, $mailUser, $mailUser))->result();
	}

	public function getdatosGeneralesRecoveryPasswordSuscriptor($hashSuscriptor) {
		$sqlDatosGeneralesSuscriptor = "SELECT ds.usuarioSuscriptor, ds.emailSuscriptor, drcs.codigoSeguridad
											FROM datossuscriptor ds 
											INNER JOIN datosrecuperacontraseniasuscriptor drcs ON ds.idSuscriptor = drcs.idSuscriptor
											WHERE ds.hashSuscriptor = ? 
											AND drcs.banderaRecovery = 0";
		return $this->db->query($sqlDatosGeneralesSuscriptor, array($hashSuscriptor))->result();
	}

	public function setDatosRecuperaContraseniaSuscriptor($valoresInsert) {
		if($this->db->insert("datosrecuperacontraseniasuscriptor", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function updateDatosRecuperaContraseniaSuscriptor($datosUpdateSuscriptor, $where) {
		if($this->db->update("datosrecuperacontraseniasuscriptor", $datosUpdateSuscriptor, $where)) {
			return true;
		} else {
			return false;
		}
	}


}
?>

