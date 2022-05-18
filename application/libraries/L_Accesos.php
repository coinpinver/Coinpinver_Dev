<?php
if ( ! defined("BASEPATH")) exit("No direct script access allowed");    
class L_Accesos{

	function __construct(){
		$this->ci =& get_instance();
		$this->ci->load->model('M_DatosAccesos');
		$this->ci->load->library('L_Fotografia');
	}
	public function LA_Acceso($hashUsuario)
	{
		$acceso = $this->ci->M_DatosAccesos->MDA_Accesos($hashUsuario);

		foreach ($acceso as $val) {
			echo $idPlataforma = $val->idPlataforma;
			echo "<br>";
			echo "descripPlataforma -> ".$descripPlataforma = $val->descripPlataforma;
			echo "<br>";
			$descripPerfilPlataforma = $val->descripPerfilPlataforma;
			echo "<br>";
			if($descripPlataforma == "Coinpinver")
			{
				$_SESSION["ACCESO-COINPINVER"] = "USUARIO";		
			}
			if($descripPlataforma == "E-learning")
			{
				$_SESSION["ACCESO-ELEARGIN"] = "USUARIO";
			}
			if($descripPerfilPlataforma == "Admin")
			{
				$_SESSION["Admin"] = "Admin";
			}
		}
		
		if(count($acceso)>0)
		{

			$_SESSION['idUsuario'] = $acceso[0]->idDatosUsuario;
			$_SESSION['aliasUsuario'] = $acceso[0]->userControlUsuario;
			$_SESSION['hashUsuario'] = $hashUsuario;
			$_SESSION['rutaFotografiaUsuario'] = $this->ci->l_fotografia->LF_GetFotografiaUsuario($hashUsuario);	
		}
		
	}

	
}
?>