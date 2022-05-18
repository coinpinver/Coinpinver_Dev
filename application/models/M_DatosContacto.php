<?php
Class M_DatosContacto extends CI_MODEL
{
	/*para cachar el error $db_error=$this->db->error();
	echo $db_error['code']."<br>";
	echo $db_error['message'];*/
	


	public function __construct() {
		parent::__construct();
	}

	public function getDatosContactoGenelar($donde="") {
		return $res_datosGrales=$this->db->query("SELECT idContacto, nombreContacto, emailContacto, mensajeContacto FROM datoscontacto " . $donde)->result();
	}

	public function setDatosContacto($valoresInsert) {
		if($this->db->insert("datoscontacto", $valoresInsert)) {
			return true;
		} else {
			return false;
		} 
	}



	/*public function Consultar($query) {
		if ($resultados=$this->base_seleccionada->query($query))
		{
			return $resultados->result();
		}
	}

	public function desconectar()
	{
		$this->base_seleccionada->close();
	}*/
}
?>