<?php
Class M_DatosIniciarSesionUsuario extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function setUsuario_ante($valoresInsert, $hashUsuario, $username, $vscsContrasenia) {
		//$this->db->transBegin();
		$this->db->trans_start();

		$insertUsu = $this->db->insert("datosusuario", $valoresInsert);
		
		$r_usu = $this->getUsuario($hashUsuario);
		$id_Usuario = $r_usu[0]->idUsuario;
		
		$valoresInsertPass = array("idUsuario"=>$id_Usuario, "user"=>$username, "password"=>$vscsContrasenia);
		$insertPass = $this->db->insert("controlusuario", $valoresInsertPass);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// fallo el registro
		    $this->db->trans_rollback();
		    
		}
		else
		{
			//se registro
	        $this->db->trans_commit();
		        
		}
		return !$this->db->trans_status() ? false : true;
		
	}
	public function setUsuario($valoresInsert) {
		//$this->db->transBegin();
		$this->db->trans_start();

		$insertUsu = $this->db->insert("datosusuario", $valoresInsert);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// fallo el registro
		    $this->db->trans_rollback();
		    
		}
		else
		{
			//se registro
	        $this->db->trans_commit();
		        
		}
		return !$this->db->trans_status() ? false : true;
		
	}
	public function getUsuario($hashSuscriptor)
	{
		$sqlExistUsu = "SELECT idDatosUsuario from datosusuario where hashUsuario = ?";
		return $this->db->query($sqlExistUsu, array($hashSuscriptor))->result();
	}
	public function setControlacceso($valoresInsert)
	{
		$this->db->trans_start();

		$insertUsu = $this->db->insert("controlacceso", $valoresInsert);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// fallo el registro
		    $this->db->trans_rollback();
		    
		}
		else
		{
			//se registro
	        $this->db->trans_commit();
		        
		}
		return !$this->db->trans_status() ? false : true;
	}
	public function setdatoscuenta($valoresInsert)
	{
		$this->db->trans_start();

		$insertUsu = $this->db->insert("controlacceso", $valoresInsert);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// fallo el registro
		    $this->db->trans_rollback();
		    
		}
		else
		{
			//se registro
	        $this->db->trans_commit();
		        
		}
		return !$this->db->trans_status() ? false : true;
	}
	public function getPerfilPlataforma()
	{
		$perfilPlataforma = "SELECT cpp.idPerfilPlataforma from catperfilplataforma  cpp
		inner join catplataforma cp on cp.idPlataforma = cpp.idPlataforma
		where 
		cp.descripPlataforma like '%coin%'";
		return $this->db->query($perfilPlataforma)->result();
	}
	public function getEstatusCuenta()
	{
		$estatusCuenta = "SELECT idEstatusCuenta from catestatuscuenta where descripEstatusCuenta like '%Confir%' limit 1";
		return $this->db->query($estatusCuenta)->result();
	}

	public function setRegistroUsuario($valoresInsertUsuario, $hashUsuario, $aliasUsuario, $emailUsuario, $passwordControlUsuario)
	{
		$this->db->trans_start();
		//insertar en la tabla datosusuario
		$insertDatosUsuario = $this->db->insert("datosusuario", $valoresInsertUsuario);

		$q_getUsuario = $this->getUsuario($hashUsuario);
		$idDatosUsuario = $q_getUsuario[0]->idDatosUsuario;
		
		$valoresInsertControlAcceso = array("idDatosUsuario"=>$idDatosUsuario,
						"userControlUsuario"=>$aliasUsuario, 
						"emailControlUsuario"=>$emailUsuario,
						"passwordControlUsuario"=>$passwordControlUsuario
						);
		//insertar en la tabla controlacceso
		$insertControlAcceso = $this->db->insert("controlacceso", $valoresInsertControlAcceso);
			
		$q_getPerfilPlataforma = $this->getPerfilPlataforma();
		$idPerfilPlataforma = $q_getPerfilPlataforma[0]->idPerfilPlataforma;

		//estatus
		$q_getEstatusCuenta = $this->getEstatusCuenta();
		$idEstatusCuenta = $q_getEstatusCuenta[0]->idEstatusCuenta;
		date_default_timezone_set("America/Mexico_City");
		$fechaAltaCuenta = date('Y-m-d H:i:s');

		$valoresInsertdatoscuenta = array("idDatosUsuario"=>$idDatosUsuario,
				"idPerfilPlataforma"=>$idPerfilPlataforma,
				"idEstatusCuenta"=>$idEstatusCuenta,
				"fechaAltaCuenta"=>$fechaAltaCuenta
		);
		$insertDatosCuenta = $this->db->insert("datoscuenta", $valoresInsertdatoscuenta);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// fallo el registro
		    $this->db->trans_rollback();
		    
		}
		else
		{
			//se registro
	        $this->db->trans_commit();
		        
		}
		return !$this->db->trans_status() ? false : true;
	}

	public function getCattipomovimiento()
	{
		$tipoMotivmiento = "SELECT idTipoMovimiento from cattipomovimiento where descripTipoMovimiento like '%Conf%Cuen%Nuev%'";
		return $this->db->query($tipoMotivmiento)->result();
	}
	public function getdatoscuenta($hashUsuario)
	{
		
		$datosUsuario = "SELECT idCuenta from datosusuario du
			inner join datoscuenta dc on dc.idDatosUsuario = du.idDatosUsuario
			where du.hashUsuario = ?";
		return $this->db->query($datosUsuario, array($hashUsuario))->result();
	}
	public function setDatosConfirmamovimiento($valoresInsert)
	{
		if($this->db->insert("datosconfirmamovimiento", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function getDatosGeneralesUsuario($hashUsuario) {
		$sqlDatosUsuario = "SELECT du.idDatosUsuario, du.emailUsuario, ca.userControlUsuario, cs.idSexo, cs.descripSexo, cp.idPais, cp.descripPais from datosusuario du
			inner join datoscuenta dc on dc.idDatosUsuario = du.idDatosUsuario
			inner join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			inner join catsexo cs on cs.idSexo = du.idSexo
			inner join catpais cp on cp.idPais = du.idPais
			where du.hashUsuario = ?";
		return $this->db->query($sqlDatosUsuario, array($hashUsuario))->result();
	}
	public function getConfirmaUsuario($hashUsuario) {
		$sqlDatosUsuario = "SELECT dcm.idConfirmaUsuario, du.idDatosUsuario, DATE_FORMAT(dcm.fechaVenceCodigo, '%d-%m-%Y %H:%i:00') AS fechaVenceCodigo,
			dcm.codigoSeguridad, dcm.banderaConfirma
			from datosusuario du
			left join datosconfirmamovimiento dcm on dcm.idDatosUsuario = du.idDatosUsuario
			left join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			where du.hashUsuario = ?";
		return $this->db->query($sqlDatosUsuario, array($hashUsuario))->result();
	}
	public function updateDatosConfirmaUsuario($datosUpdateUsuario, $where) {

		if($this->db->update("datosconfirmamovimiento", $datosUpdateUsuario, $where)) 
		{
			return true;
		} 
		else {
			return false;
		}
	}
	
	public function getExistDatosConfirmaUsuario($hashUsuario) {
		$sqlExistDatosGeneralesUsuario = "SELECT du.idDatosUsuario from datosusuario du 
		inner join datosconfirmamovimiento dcm on dcm.idDatosUsuario = du.idDatosUsuario
		where du.hashUsuario =  ? ";
		return $this->db->query($sqlExistDatosGeneralesUsuario, array($hashUsuario))->result();
	}
	public function setDatosConfirmaUsuario($valoresInsert) {
		if($this->db->insert("datosconfirmamovimiento", $valoresInsert)) {
			return true;
		} else {
			return false;
		}
	}

	public function setControlUsuario($valoresInsertPass)
	{
		if($this->db->insert("controlusuario", $valoresInsertPass)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getExisteUsuarioPassword($usuario, $emailUsuario) {
		$sqlDatosUsuario = "SELECT du.idDatosUsuario   from datosusuario du
		inner join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
		where 
		(ca.userControlUsuario = ? or du.emailUsuario = ? ) and ca.passwordControlUsuario = MD5(?)";

		return $this->db->query($sqlDatosUsuario, array($usuario, $usuario, $emailUsuario))->num_rows();
	}
	public function getExisteEmailUsuario($emailUsuario) {
		$sqlUsu = "SELECT emailUsuario from datosusuario where emailUsuario = ?";
		return $this->db->query($sqlUsu, array($emailUsuario))->num_rows();
	}

	public function getExisteUsuario($aliasusuario) {
		$sqlUsuario = "SELECT userControlUsuario from controlacceso where  userControlUsuario = ?";
		return $this->db->query($sqlUsuario, array($aliasusuario))->num_rows();
	}
	public function getDatosUsuario($usuario, $emailUsuario)
	{
		$sqlDatosUsuario = "SELECT du.idDatosUsuario, du.nombreUsuario, du.apPatUsuario, du.apMatUsuario, du.fechaNacimientoUsuario, du.emailUsuario, du.fotoUsuario, du.hashUsuario,
			cs.idSexo, cs.descripSexo, cp.idPais, cp.descripPais, ca.userControlUsuario, dcm.banderaConfirma
			from datosusuario du
			LEFT join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			LEFT join datosconfirmamovimiento dcm on dcm.idDatosUsuario = du.idDatosUsuario
			LEFT JOIN catsexo cs ON cs.idSexo = du.idSexo
			LEFT JOIN catpais cp ON cp.idPais = du.idPais
			where 
			(ca.userControlUsuario = ? or du.emailUsuario = ? ) and ca.passwordControlUsuario = MD5(?)";
		return $this->db->query($sqlDatosUsuario, array($usuario, $usuario, $emailUsuario))->result();
		
	}
	/*perfil*/
	public function getDatosPerfilUsuario($hashSuscriptor)
	{
		$q_datPer = "SELECT du.idDatosUsuario, du.nombreUsuario, du.apPatUsuario, du.apMatUsuario, du.fechaNacimientoUsuario, du.emailUsuario, du.fotoUsuario, du.hashUsuario,
			cs.idSexo, cs.descripSexo, cp.idPais, cp.descripPais, ca.userControlUsuario
			from datosusuario du
			inner join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			LEFT JOIN catsexo cs ON cs.idSexo = du.idSexo
			LEFT JOIN catpais cp ON cp.idPais = du.idPais
			where 
			du.hashUsuario = ? ";
		return $this->db->query($q_datPer, array($hashSuscriptor))->result();
	}
	public function UpdateUsuario($valoresInsertUsuario, $where)
	{
		if($this->db->update("datosusuario", $valoresInsertUsuario, $where)) {
			return true;
		} else {
			return false;
		}		
	}
	public function getFotografiaUsuario($hashSuscriptor) {
		$sqlDatosUsuario = "SELECT idDatosUsuario, fotoUsuario FROM datosusuario WHERE hashUsuario = ? ";
		return $this->db->query($sqlDatosUsuario, array($hashSuscriptor))->result();
	}
	public function getIdDatosUsuario($idDatosUsuario) {
		$sqlDatosUsuario = "SELECT idDatosUsuario, fotoUsuario, hashUsuario FROM datosusuario WHERE idDatosUsuario = ? ";
		return $this->db->query($sqlDatosUsuario, array($idDatosUsuario))->result();
	}
	public function getdatosGeneralesConfirmaUsuario($hashUsuario) {
		$sqlDatosGeneralesUsurio = "SELECT du.idDatosUsuario, du.nombreUsuario, du.apPatUsuario, du.apMatUsuario, du.fechaNacimientoUsuario,  du.fotoUsuario, du.hashUsuario,
		cs.idSexo, cs.descripSexo, cp.idPais, cp.descripPais, du.emailUsuario, ca.userControlUsuario, dcm.banderaConfirma, dcm.codigoSeguridad
		from datosusuario du
		left join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
		left join datosconfirmamovimiento dcm on dcm.idDatosUsuario = du.idDatosUsuario
		LEFT JOIN catsexo cs ON cs.idSexo = du.idSexo
		LEFT JOIN catpais cp ON cp.idPais = du.idPais
		where
		du.hashUsuario = ? ";
		return $this->db->query($sqlDatosGeneralesUsurio, array($hashUsuario))->result();
	}

	/*recuperar contraseña*/
	public function getUsuarioRecoveryPassword($emailUsuario) {
		$sqlDatosRecoveryPasswordUsuario = "SELECT  du.idDatosUsuario, drcu.idRestaurarContrasenia, drcu.banderaRecovery, du.hashUsuario from datosusuario du
			left join controlacceso ca on ca.idDatosUsuario = du.idDatosUsuario
			left join datosrecuperacontraseniausuario drcu on drcu.idDatosUsuario = du.idDatosUsuario
			where du.emailUsuario = ? or ca.userControlUsuario = ?
			order by idRestaurarContrasenia DESC
			LIMIT 1";
		return $this->db->query($sqlDatosRecoveryPasswordUsuario, array($emailUsuario, $emailUsuario))->result();
	}
	public function getExistePerfilPlataforma($idDatosUsuario, $idPerfilPlataforma)
	{
		$sqlExistePerfilElearning = "SELECT * from datoscuenta where idDatosUsuario = ? and idPerfilPlataforma = ?";
		return $this->db->query($sqlExistePerfilElearning, array($idDatosUsuario, $idPerfilPlataforma))->num_rows();
	} 
	/*registro de nuevo perfil e-learning cuando se loguee*/
	public function setdatoscuentaPerfil($valoresInsertdatoscuenta)
	{
		
		$this->db->trans_start();

		$insertDatosCuenta = $this->db->insert("datoscuenta", $valoresInsertdatoscuenta);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// fallo el registro
		    $this->db->trans_rollback();
		    
		}
		else
		{
			//se registro
	        $this->db->trans_commit();
		        
		}
		return !$this->db->trans_status() ? false : true;
	}

}
?>

