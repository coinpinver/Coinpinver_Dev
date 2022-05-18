<?php
Class M_DatosCatPais extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}

	public function getCatPaisGeneral() {
		$sqlCatPais = "SELECT idPais, clavePais, descripPais FROM catpais where clavePais != 'PNE' ORDER BY descripPais ASC ";
		return $this->db->query($sqlCatPais)->result();
	}
	public function getCatSinPais() {
		$sqlCatSinPais = "SELECT idPais from catpais where clavePais like '%PNE%'";
		return $this->db->query($sqlCatSinPais)->result();
	}
}
?>