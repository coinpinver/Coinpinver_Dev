<?php
Class M_DatosCatModuloCurso extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}

	public function getCatModuloCurso($hashCurso) {
		$sqlCatModuloCurso = "SELECT cmc.idModulo, cmc.idCurso, cmc.nombreModulo, cmc.estatusModulo,
							CASE 
								WHEN ccsm.numeroSesiones IS NOT NULL THEN ccsm.numeroSesiones
								ELSE '0'
							END AS numeroSesiones
							FROM catmodulocurso cmc 
							INNER JOIN catcurso cc ON cmc.idCurso = cc.idCurso
							LEFT JOIN (
								SELECT COUNT(*) AS numeroSesiones, idModulo FROM catsesionmodulo WHERE estatusSesion = 1 GROUP BY idModulo
							) ccsm ON cmc.idModulo = ccsm.idModulo
							WHERE cc.hashCurso = ?
							AND cmc.estatusModulo  = 1
							ORDER BY cmc.idModulo ASC;";
		return $this->db->query($sqlCatModuloCurso, array($hashCurso))->result();
	}

	public function getNombreModuloCurso($idModulo) {
		$sqlNombreModuloCurso = "SELECT cmc.nombreModulo FROM catmodulocurso cmc WHERE cmc.idModulo = ?";
		return $this->db->query($sqlNombreModuloCurso, array($idModulo))->result();
	}

	public function getHashModuloCurso($idModulo) {
		$sqlNombreModuloCurso = "SELECT cmc.hashModulo FROM catmodulocurso cmc WHERE cmc.idModulo = ?";
		return $this->db->query($sqlNombreModuloCurso, array($idModulo))->result();
	}

	public function getExisteModuloCurso($nombreModulo) {
		$sqlModuloCurso = "SELECT idModulo FROM catmodulocurso WHERE nombreModulo = ? AND estatusModulo  = 1";
		return $this->db->query($sqlModuloCurso, array($nombreModulo))->result();
	}

	public function setModuloCurso($valoresInsert) {
		if($this->db->insert("catmodulocurso", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function updateModuloCurso($datosUpdateSuscriptor, $where) {
		if($this->db->update("catmodulocurso", $datosUpdateSuscriptor, $where)) {
			return true;
		} else {
			return false;
		}
	}
}
?>