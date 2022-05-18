<?php
Class M_AdminUsuariosRegistrados extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
	}
	public function MAUR_RegistradosCoinpinver()
	{
		
		$q_usuregis = "SELECT du.idDatosUsuario, du.nombreUsuario, du.apPatUsuario, du.apMatUsuario, du.emailUsuario,
			dc.idPerfilPlataforma, cpp.descripPerfilPlataforma, cp.idPlataforma, cp.descripPlataforma, dc.fechaAltaCuenta, du.idPais, cpa.descripPais
			from datosusuario du
			inner join datoscuenta dc on dc.idDatosUsuario = du.idDatosUsuario
			inner join catperfilplataforma cpp on cpp.idPerfilPlataforma = dc.idPerfilPlataforma
			inner join catplataforma cp on cp.idPlataforma = cpp.idPlataforma
			inner join catpais cpa on cpa.idPais = du.idPais
			where cpp.idPerfilPlataforma != (select idPerfilPlataforma from catperfilplataforma where descripPerfilPlataforma like '%admin%')
			order by 1, 6 asc";
		return $this->db->query($q_usuregis)->result();
	}
	public function MAUR_RegistradosPorPais()
	{
		
		$q_usuregis = "SELECT du.idPais, cpa.descripPais, count(*)  as cuantosPais
		from datosusuario du
		inner join datoscuenta dc on dc.idDatosUsuario = du.idDatosUsuario
		inner join catperfilplataforma cpp on cpp.idPerfilPlataforma = dc.idPerfilPlataforma
		inner join catplataforma cp on cp.idPlataforma = cpp.idPlataforma
		inner join catpais cpa on cpa.idPais = du.idPais
		where cpp.idPerfilPlataforma != (select idPerfilPlataforma from catperfilplataforma where descripPerfilPlataforma like '%admin%')
		GROUP BY du.idPais
		HAVING COUNT(*)>1
		order by 1 desc";
		return $this->db->query($q_usuregis)->result();
	}
	


}
?>

