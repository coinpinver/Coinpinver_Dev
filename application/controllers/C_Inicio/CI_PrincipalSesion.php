<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CI_PrincipalSesion extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->model('M_DatosIniciarSesionUsuario');
		$this->load->model('M_DatosCatPais');
		$this->load->model('M_DatosCatSexo');		
		$this->load->library("L_Alertas");
		$this->load->library('L_Generales');
		$this->load->library('L_Fotografia');
		$this->load->library("L_Accesos");
		$this->load->library("L_Correos");
		$this->load->helper('url');

	}

	public function CIP_Home() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Inicio/VI_Home"; 
		$this->load->view("Principal", $datos);
	}
	public function CIP_FormRegistrarse()
	{
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Usuario/VI_Registrarse"; 
		$this->load->view("Principal", $datos);
	}
	
	/*Registrar solamente el usuario, correo y contraseña*/
	public function CIP_GuardaRegistrarse()
	{

		if($this->input->post())
		{
			$banderaUsuario = true;
			$banderaInsertUsuario = false;
			$campo = "";
			$valorCampo = "";
			
			$numEmailUsuario = $this->M_DatosIniciarSesionUsuario->getExisteEmailUsuario($this->input->post("emailUsuario"));
			
			if($numEmailUsuario <= 0) {
				
				$numusuarioUsuario = $this->M_DatosIniciarSesionUsuario->getExisteUsuario($this->input->post("aliasUsuario"));
				
				if($numusuarioUsuario <= 0) {
					
					$username = "";
					$paternoUsuario = "";
					$maternoUsuario = "";
					$aliasUsuario = $this->input->post("aliasUsuario");
					$emailUsuario = $this->input->post("emailUsuario");
					$fechaNacimientoUsuario = date("d-m-Y");
					$r_sexo =$this->M_DatosCatSexo->getCatSinSexo();
					$sexo = $r_sexo[0]->idSexo;
					$r_pais =$this->M_DatosCatPais->getCatSinPais();
					$Pais = $r_pais[0]->idPais;

					$vscsContrasenia = md5($this->input->post("vscsContrasenia"));		
					$hashUsuario = md5($aliasUsuario);
					$fechaAltaUsuario = date("d-m-Y");
					$valoresInsertUsuario = array("idSexo" => $sexo,
						"idPais" => $Pais,
						"emailUsuario" => $emailUsuario,
						"hashUsuario" =>$hashUsuario
						);

					$passwordControlUsuario = md5($this->input->post("vscsContrasenia"));

					$banderaRegistroUsuario =$this->M_DatosIniciarSesionUsuario->setRegistroUsuario($valoresInsertUsuario, $hashUsuario, $aliasUsuario, $emailUsuario, $passwordControlUsuario);
					
					//ya se inserto en las tablas de datosusuario, controlacceso, datoscuenta
					if($banderaRegistroUsuario == 1)
					{
						//envíar correo para la confirmación del correo e insertar en la tabla de datosconfirmamovimiento
						$TipoMovimiento = $this->M_DatosIniciarSesionUsuario->getCattipomovimiento();
						$idTipoMovimiento = $TipoMovimiento[0]->idTipoMovimiento;
						$r_Datoscuenta = $this->M_DatosIniciarSesionUsuario->getdatoscuenta($hashUsuario);
						$idCuenta = $r_Datoscuenta[0]->idCuenta;
						$codigoseguridad = $this->l_generales->CSA_GetCodigoSeguridadConfirma();
						$fechaVecimiento = $this->l_generales->CSA_GenerarFechaVencimientoCodigo();
						$banderaConfirma = 0;
						$q_getUsuario = $this->M_DatosIniciarSesionUsuario->getUsuario($hashUsuario);
						$idDatosUsuario = $q_getUsuario[0]->idDatosUsuario;
						$valoresInsertDatosconfirmamovimiento = array("idDatosUsuario"=>$idDatosUsuario,
							"idTipoMovimiento"=>$idTipoMovimiento,
							"idCuenta"=>$idCuenta,
							"codigoseguridad"=>$codigoseguridad,
							"fechaVenceCodigo"=>$fechaVecimiento,
							"banderaConfirma"=>$banderaConfirma
						);

						$banderaInsertConfirma = $this->M_DatosIniciarSesionUsuario->setDatosConfirmamovimiento($valoresInsertDatosconfirmamovimiento);
						
						if($banderaInsertConfirma == 1) {
							//enviar notificación
							//$this->l_correos->LC_EnviaConfirmaCuentaUsuario($hashUsuario);
							redirect("ConfirmaCuentaUsuario/" . $hashUsuario);
						}
						
					}
					
					
				} 
				else {
					
					$banderaInsertUsuario = "EXISTEUSUARIO";
					$campo = "nombre del usuario";
					$valorCampo = $this->input->post("aliasUsuario");
					$banderaUsuario = false;
				}
			} else {
				$banderaInsertUsuario = "EXISTECORREO";
				
				$campo = "email";
				$valorCampo = $this->input->post("emailUsuario");
				$banderaUsuario = false;
			}
			if($banderaUsuario == false) {
				
				$datos["informacion"] = array("banderaInsert" => $banderaInsertUsuario,
											"campo" => $campo,
											"valorCampo" => $valorCampo);
				$datos["ubicacion_vista"] = "/V_Usuario/VU_AlertaUsuario"; 
				$this->load->view("Principal", $datos);
			}
		}
		else
		{
			redirect("RegistroUsuario");
		}
		
	}

	public function CSP_ConfirmarCuentaUsuario($hashUsuario) {


		$resDatosUsuario = $this->M_DatosIniciarSesionUsuario->getDatosGeneralesUsuario($hashUsuario);
		
		if(count($resDatosUsuario) >= 1) {
			
			$resDatosConfirmaUsuario = $this->M_DatosIniciarSesionUsuario->getConfirmaUsuario($hashUsuario);
			
			if(count($resDatosConfirmaUsuario) >= 1) {
				
				if($resDatosConfirmaUsuario[0]->banderaConfirma != null) {

					$banderaConfirma = $resDatosConfirmaUsuario[0]->banderaConfirma;
				} else {
					$banderaConfirma = 0;
				}
			} else {
				$banderaConfirma = 0;
			}

			$datosSuscriptor["nombreSuscriptor"] = $resDatosUsuario[0]->userControlUsuario;

			$datos["informacion"] = array("hashUsuario" => $hashUsuario,
										"datosSuscriptor" => $datosSuscriptor,
										"banderaConfirma" => $banderaConfirma);
			$datos["ubicacion_vista"] = "/V_Usuario/VS_ConfirmaCuentaUsuario"; 
			$this->load->view("Principal", $datos);
			
		} else {
			
			echo "mil disculpas, estamos en servicio";
			/*$datos["informacion"] = array();
			$datos["ubicacion_vista"] = "/V_Suscriptor/VS_NoPerfilSuscriptor"; 
			$this->load->view("Principal", $datos);*/
		}

	}
	public function CSP_SetConfirmarCuentaUsuario() {

		if($this->input->post()) {
			
			date_default_timezone_set("America/Mexico_City");

			$resDatosConfirmacion = $this->M_DatosIniciarSesionUsuario->getConfirmaUsuario($this->input->post("hashUsuario"));
			
			if(count($resDatosConfirmacion) >= 1) {
				
				$fechaActual = date("d-m-Y H:i:s",strtotime(date("d-m-Y H:i:00")));
				$fechaVenceCodigo = date("d-m-Y H:i:s",strtotime($resDatosConfirmacion[0]->fechaVenceCodigo));
				
				if($fechaActual <= $fechaVenceCodigo) {
						
					if($this->input->post("codigoSeguridad") == $resDatosConfirmacion[0]->codigoSeguridad) {
						
						$datosUpdateDatosConfirmaSuscriptor = array("banderaConfirma" => "1");
						$where = array("idDatosUsuario" => $resDatosConfirmacion[0]->idDatosUsuario);
						
						$banderaUpdate = $this->M_DatosIniciarSesionUsuario->updateDatosConfirmaUsuario($datosUpdateDatosConfirmaSuscriptor, $where);
						
						if($banderaUpdate == 1) {
							echo "<input class='form-control form-control-sm' id='banderaConfirmaCuenta' name='banderaConfirmaCuenta' value='TRUE' type='hidden'/>";
						} else {
							$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al confirmar tu cuenta. Intentalo mas tarde.","danger");
						}
					} else {
						$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, El código que ingresaste no es el correcto. Intenta generardo un nuevo código y te lo enviamos por correo electrónico.","warning");
					}
				} 
				else 
				{
					$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, Tu código ha caducado, ya no es valido. Intenta generardo un nuevo código y te lo enviamos por correo electrónico.","warning");
				}
				
			} else {
				$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error verificar tu información. Intentalo mas tarde","danger");
			}
		}
	}
	public function CSP_ReenviarConfirmarCuentaUsuario() {
		if($this->input->post()) {

			$resDatosConfirmacion = $this->M_DatosIniciarSesionUsuario->getConfirmaUsuario($this->input->post("hashUsuario"));
			$banderageneraCodigoConfirma = 0;

			if(count($resDatosConfirmacion) >= 1) {

				if($resDatosConfirmacion[0]->banderaConfirma != null) {

					$datosUpdateDatosConfirmaSuscriptor = array("codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
																"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
					$where = array("idDatosUsuario" => $resDatosConfirmacion[0]->idDatosUsuario);

					
					$banderageneraCodigoConfirma = $this->M_DatosIniciarSesionUsuario->updateDatosConfirmaUsuario($datosUpdateDatosConfirmaSuscriptor, $where);

				} else {
					$banderageneraCodigoConfirma = 1;
					$existDatosConfirmaSuscriptor = $this->M_DatosIniciarSesionUsuario->getExistDatosConfirmaUsuario($this->input->post("hashUsuario"));

					if(count($existDatosConfirmaSuscriptor) <= 0) {
						$valoresInsertConfirma = array("idDatosUsuario" => $resDatosConfirmacion[0]->idDatosUsuario,
														"codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
														"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
						$banderageneraCodigoConfirma = $this->M_DatosIniciarSesionUsuario->setDatosConfirmaUsuario($valoresInsertConfirma);
					}
				}
			} else {
				$banderageneraCodigoConfirma = 1;
				$existDatosConfirmaSuscriptor = $this->M_DatosIniciarSesionUsuario->getExistDatosConfirmaUsuario($this->input->post("hashUsuario"));
				
				if(count($existDatosConfirmaSuscriptor) <= 0) {
					$valoresInsertConfirma = array("idDatosUsuario" => $resDatosConfirmacion[0]->idDatosUsuario,
													"codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
													"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
					$banderageneraCodigoConfirma = $this->M_DatosIniciarSesionUsuario->setDatosConfirmaUsuario($valoresInsertConfirma);
				}
			}

			if($banderageneraCodigoConfirma == 1) {
				//enviar notificación cuando se reenvio el codigo de seguridad
				//$this->l_correos->LC_EnviaConfirmaCuentaUsuario($this->input->post("hashUsuario"));
				$this->l_alertas->LA_ShowAlertas("¡Éxito!","Se reenvío tu codigo de seguridad de confirmación de cuenta.","success");
			} else {
				$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al reenviar el correo electrónico. Intentalo mas tarde","danger");
			}

		} else {
			$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al reenviar el correo electrónico. Intentalo mas tarde","danger");
		}
	}
	public function CIP_FormIniciaSesion()
	{
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Inicio/VI_IniciaSesion"; 
		$this->load->view("Principal", $datos);
	}
	public function CIP_AccesoLogin() {

		if($this->input->post()) {

			$this->CIP_ControlAcceso($_POST['userMail'], $_POST['password']);
		} else {
			redirect("IniciarSesion");
		}
		
	}
	public function CIP_ControlAcceso($userMail, $password) {

		$numDatosInicioSesion = $this->M_DatosIniciarSesionUsuario->getExisteUsuarioPassword($userMail, $password);
		

		if($numDatosInicioSesion >= 1) {

			$resDatosUsuario = $this->M_DatosIniciarSesionUsuario->getDatosUsuario($userMail, $password);
			
			$hashUsuario = $resDatosUsuario[0]->hashUsuario;
			//$banderaConfirma = 1; // bandera que indica si ya confirmo el correo
			if($resDatosUsuario[0]->banderaConfirma == 1) {
				$this->l_accesos->LA_Acceso($hashUsuario);
				
				/*registrar el nuevo acceso a la plataforma*/
				$idDatosUsuario = $resDatosUsuario[0]->idDatosUsuario;
				$q_getPerfilPlataforma = $this->M_DatosIniciarSesionUsuario->getPerfilPlataforma();
				$idPerfilPlataforma = $q_getPerfilPlataforma[0]->idPerfilPlataforma;	
				// validar si este usuario ya tiene perfil a la e-learning en datoscuenta 		
				$PerfilUsuEleargning = $this->M_DatosIniciarSesionUsuario->getExistePerfilPlataforma($idDatosUsuario, $idPerfilPlataforma);
				if($PerfilUsuEleargning <= 0)
				{
					$q_getEstatusCuenta = $this->M_DatosIniciarSesionUsuario->getEstatusCuenta();
					$idEstatusCuenta = $q_getEstatusCuenta[0]->idEstatusCuenta;
					$fechaAltaCuenta = date("d-m-Y");
					$valoresInsertdatoscuenta = array("idDatosUsuario"=>$idDatosUsuario,
							"idPerfilPlataforma"=>$idPerfilPlataforma,
							"idEstatusCuenta"=>$idEstatusCuenta,
							"fechaAltaCuenta"=>$fechaAltaCuenta
					);
					$datoscuentaelearning = $this->M_DatosIniciarSesionUsuario->setdatoscuentaPerfil($valoresInsertdatoscuenta);
				}
				
				echo "<input class='form-control form-control-sm' id='banderaAcceso' name='banderaAcceso' value='TRUE-ACCESS' type='hidden'/>";
			} else {
				echo "<input class='form-control form-control-sm' id='banderaAcceso' name='banderaAcceso' value='TRUE-CONFIRMA' type='hidden'/>";
				echo "<input class='form-control form-control-sm' id='hashUsuario' name='hashUsuario' value='" . $hashUsuario . "' type='hidden'/>";
			}

		} else {

			echo "<input type='hidden' class='form-control form-control-sm' id='banderaAcceso' name='banderaAcceso' value='FALSE' type='hashUsuario'/>";
			$this->l_alertas->LA_ShowAlertas("¡Alerta!","El usuario y/o contraseña no existen. Favor de verificar","warning");
		}
	}

	public function CIP_InisiaSesion() // no utilizable
	{
		if($this->input->post())
		{
			$userMail = $_POST["userMail"];
			$password = $_POST["password"];
			$r_ctrlUsu = $this->M_DatosIniciarSesionUsuario->getExisteUsuarioPassword($userMail, $password);
			if($r_ctrlUsu >= 1) 
			{
				echo "ingreso correctamente";
				redirect("Inicio");
				
				
				
			}
			else
			{
				$this->l_alertas->LA_ShowAlertas("¡Alerta!","El usuario y/o contraseña no existen. Favor de verificar","warning");

				
			}	
		}
		
	}
	public function CIP_HomeSesion() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Inicio/VI_Home"; 
		$this->load->view("Contenido", $datos);
	}
	

}	
?>
