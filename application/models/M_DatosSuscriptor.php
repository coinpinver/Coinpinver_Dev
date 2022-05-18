<?php
Class M_DatosSuscriptor extends CI_MODEL
{
	/*para cachar el error $db_error=$this->db->error();
	echo $db_error['code']."<br>";
	echo $db_error['message'];*/
	


	public function __construct() {
		parent::__construct();
		//$this->load->database();
	}

	public function getDatosGeneralesSuscriptor($hashSuscriptor) {
		$sqlDatosSuscriptor = "SELECT ds.idSuscriptor, ds.nombreSuscriptor, ds.apellidosSuscriptor, ds.emailSuscriptor, ds.usuarioSuscriptor, cs.idSexo, cs.descripSexo,
							ds.telefonoSuscriptor, cp.idPais, cp.descripPais
							FROM datossuscriptor ds
							LEFT JOIN catsexo cs ON ds.idSexo = cs.idSexo
							LEFT JOIN catpais cp ON ds.idPais = cp.idPais
							WHERE ds.hashSuscriptor = ?";
		return $this->db->query($sqlDatosSuscriptor, array($hashSuscriptor))->result();
	}

	public function getFotografiaSuscriptor($hashSuscriptor) {
		$sqlDatosSuscriptor = "SELECT idSuscriptor, fotoSuscriptor FROM datossuscriptor WHERE hashSuscriptor = ?";
		return $this->db->query($sqlDatosSuscriptor, array($hashSuscriptor))->result();
	}

	public function updateInformacionPerfil($datosUpdateSuscriptor, $where) {
		if($this->db->update("datossuscriptor", $datosUpdateSuscriptor, $where)) {
			return true;
		} else {
			return false;
		}
	}

	public function updateFotografiaSuscriptor($datosFotografiaUpdateSuscriptor, $where) {
		
		if($this->db->update("datossuscriptor", $datosFotografiaUpdateSuscriptor, $where)) {
			return true;
		} else {
			return false;
		}
	}

}
?>