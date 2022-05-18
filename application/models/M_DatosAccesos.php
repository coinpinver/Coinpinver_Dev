<?php
Class M_DatosAccesos extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}
	public function MDA_Accesos($hashUsuario)
	{
		
		$q_acceso = "SELECT du.idDatosUsuario, du.nombreUsuario, du.apPatUsuario, du.apMatUsuario, ca.userControlUsuario, du.emailUsuario, dc.idPerfilPlataforma, cpp.descripPerfilPlataforma, cp.idPlataforma, cp.descripPlataforma
			from datosusuario du
			inner join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			inner join datoscuenta dc on dc.idDatosUsuario = du.idDatosUsuario
			inner join catperfilplataforma cpp on cpp.idPerfilPlataforma = dc.idPerfilPlataforma
			inner join catplataforma cp on cp.idPlataforma = cpp.idPlataforma
			inner join catestatuscuenta cec on cec.idEstatusCuenta = dc.idEstatusCuenta
			where
			du.hashUsuario = ? and dc.idEstatusCuenta = 1";
		return $this->db->query($q_acceso, array($hashUsuario))->result();
	}

	


}
?>

