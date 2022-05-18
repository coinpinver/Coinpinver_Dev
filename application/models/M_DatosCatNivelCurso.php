<?php
Class M_DatosCatNivelCurso extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}

	public function getCatNivelCurso() {
		$sqlCatNivelCurso = "SELECT idNivelCurso, descripNivelCurso, iconoNivelCurso FROM catnivelcurso ORDER BY idNivelCurso ASC";
		return $this->db->query($sqlCatNivelCurso)->result();
	}
}
?>