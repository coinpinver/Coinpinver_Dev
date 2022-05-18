<?php
Class M_DatosCatSexo extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}

	public function getCatSexoGeneral() {
		$sqlCatSexo = "SELECT idSexo, descripSexo FROM catsexo where descripSexo != 'Sin sexo' ORDER BY idSexo ASC";
		return $this->db->query($sqlCatSexo)->result();
	}
	public function getCatSinSexo() {
		$sqlCatSinSexo = "select idSexo from catsexo where descripSexo like '%Sin%'";
		return $this->db->query($sqlCatSinSexo)->result();
	}

	
}
?>