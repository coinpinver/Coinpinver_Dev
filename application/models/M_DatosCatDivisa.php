<?php
Class M_DatosCatDivisa extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}

	public function getCatDivisa() {
		$sqlCatNivelCurso = "SELECT idDivisa, descripDivisa, abreviaturaDivisa FROM catdivisa ORDER BY idDivisa ASC";
		return $this->db->query($sqlCatNivelCurso)->result();
	}
}
?>


