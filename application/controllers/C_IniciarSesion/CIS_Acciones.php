<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CIS_Acciones extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model("M_DatosIniciarSesion");
		$this->load->model("M_DatosSuscriptor");
		$this->load->library("L_Fotografia");
		$this->load->library("L_Generales");
		$this->load->library("L_Alertas");
		$this->load->library("L_Correos");
	}

	public function CISA_AccesoLogin() {
		if($this->input->post()) {
			$this->CISA_ControlAcceso($this->input->post("userMail"), $this->input->post("password"));
		} else {
			redirect("IniciarSesion");
		}
	}

	public function CISA_ControlAcceso($userMail, $password) {
		$numDatosInicioSesion = $this->M_DatosIniciarSesion->getExisteUsuarioPassword($userMail, $password);
		if($numDatosInicioSesion >= 1) {

			$resDatosSuscriptor = $this->M_DatosIniciarSesion->getDatosSuscriptor($userMail, $password);
			$hashSuscriptor = $resDatosSuscriptor[0]->hashSuscriptor;
			
			if($resDatosSuscriptor[0]->banderaConfirma == 1) {
				$_SESSION["ACCESO-COINPINVER"] = "SUSCRIPTOR";

				$_SESSION['idSuscriptor'] = $resDatosSuscriptor[0]->idSuscriptor;
				$_SESSION['usuarioSuscriptor'] = $resDatosSuscriptor[0]->usuarioSuscriptor;
				$_SESSION['hashSuscriptor'] = $hashSuscriptor;
				$_SESSION['rutaFotografiaSuscriptor'] = $this->l_fotografia->LF_GetFotografiaSuscriptor($hashSuscriptor);

				echo "<input class='form-control form-control-sm' id='banderaAcceso' name='banderaAcceso' value='TRUE-ACCESS' type='hidden'/>";
			} else {
				echo "<input class='form-control form-control-sm' id='banderaAcceso' name='banderaAcceso' value='TRUE-CONFIRMA' type='hidden'/>";
				echo "<input class='form-control form-control-sm' id='hashSuscriptor' name='hashSuscriptor' value='" . $hashSuscriptor . "' type='hidden'/>";
			}

		} else {
			echo "<input class='form-control form-control-sm' id='banderaAcceso' name='banderaAcceso' value='FALSE' type='hidden'/>";
			$this->l_alertas->LA_ShowAlertas("¡Alerta!","El usuario y/o contraseña no existen. Favor de verificar","warning");
		}
	}

	public function CISA_SendCodeSecurity() {
		
		if($this->input->post()) {
			$userMail = $this->input->post("userMail");
			$resDatosUsuarioEmailUser = $this->M_DatosIniciarSesion->getUsuarioRecoveryPassword($userMail);

			

			if(count($resDatosUsuarioEmailUser) >= 1) 
			{

				if(strlen($resDatosUsuarioEmailUser[0]->banderaRecovery) >= 1) 
				{
					
					if($resDatosUsuarioEmailUser[0]->banderaRecovery == 1) 
					{
						$valoresInsertConfirma = array("idDatosUsuario" => $resDatosUsuarioEmailUser[0]->idDatosUsuario,
														"codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
														"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
						$banderaGeneraCodeRecoveryPassword = $this->M_DatosIniciarSesion->setDatosRecuperaContraseniaUsuario($valoresInsertConfirma);
					} else {
						$datosUpdateDatosRecuperarContrasenia = array("codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
																"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
						$where = array("idRestaurarContrasenia" => $resDatosUsuarioEmailUser[0]->idRestaurarContrasenia);
						
						$banderaGeneraCodeRecoveryPassword = $this->M_DatosIniciarSesion->updateDatosRecuperaContraseniaUsuario($datosUpdateDatosRecuperarContrasenia, $where);
					}					
				} else {

					$valoresInsertConfirma = array("idDatosUsuario" => $resDatosUsuarioEmailUser[0]->idDatosUsuario,
													"codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
													"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
					$banderaGeneraCodeRecoveryPassword = $this->M_DatosIniciarSesion->setDatosRecuperaContraseniaUsuario($valoresInsertConfirma);
				}

				if($banderaGeneraCodeRecoveryPassword == 1) {
					$this->l_correos->LC_EnviaRecuperaContraseniaUsuario($resDatosUsuarioEmailUser[0]->hashUsuario);
					$this->l_alertas->LA_ShowAlertas("¡Éxito!","Se envió tu codigo de seguridad para la recuperación de contraseña.","success");
					echo "<input class='form-control form-control-sm' id='banderaRecoveryPasswordEnviarCodigo' name='banderaRecoveryPasswordEnviarCodigo' value='TRUE' type='text'/>";
				} else {
					$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al enviar el código de seguridad a tu correo electrónico. Intentalo mas tarde","danger");
				}


			} else {
				$this->l_alertas->LA_ShowAlertas("¡Alerta!","El correo electrónico o nombre de usuario no existen. Favor de verificar","warning");
			}

		} else {
			$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, surgió un error al enviar el correo electrónico","warning");
		}
	}

	public function CISA_ValidateCodeSecurity() {
		if($this->input->post()) {
			date_default_timezone_set("America/Mexico_City");

			$resExisteCodigoSeguridad = $this->M_DatosIniciarSesion->getExisteCodigoSeguridadRecoveryPasswordUsuario($this->input->post("codigoSeguridad"), $this->input->post("userMail")); 

			if(count($resExisteCodigoSeguridad) >= 1) {

				$fechaActual = date("d-m-Y H:i:s",strtotime(date("d-m-Y H:i:00")));
				$fechaVenceCodigo = date("d-m-Y H:i:s",strtotime($resExisteCodigoSeguridad[0]->fechaVenceCodigo));

				if($fechaActual <= $fechaVenceCodigo) {
					echo "<input class='form-control form-control-sm' id='banderaRecoveryPasswordValidaCodigo' name='banderaRecoveryPasswordValidaCodigo' value='TRUE' type='text'/>";
					$this->l_alertas->LA_ShowAlertas("¡Éxito!","El código de seguridad es correcto.","success");
				} else {
					$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, tu código de seguridad ha caducado. Intenta generardo un nuevo código y te lo enviamos por correo electrónico.","warning");
				}

			} else {
				$this->l_alertas->LA_ShowAlertas("¡Alerta!","El código de seguridad no coincide con el que se envío por correo electrónico. Favor de verificar.","warning");
			}

		} else {
			$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, surgió un error al validar el código de seguridad","warning");
		}
	}

	public function CISA_ChangePassword() {
		if($this->input->post()) {
			date_default_timezone_set("America/Mexico_City");

			$resExisteCodigoSeguridad = $this->M_DatosIniciarSesion->getExisteCodigoSeguridadRecoveryPasswordUsuario($this->input->post("codigoSeguridad"), $this->input->post("userMail")); 

			if(count($resExisteCodigoSeguridad) >= 1) 
			{

				$fechaActual = date("d-m-Y H:i:s",strtotime(date("d-m-Y H:i:00")));
				$fechaVenceCodigo = date("d-m-Y H:i:s",strtotime($resExisteCodigoSeguridad[0]->fechaVenceCodigo));

				if($fechaActual <= $fechaVenceCodigo)
				{

					$datosUpdatePassword = array("passwordControlUsuario" => md5($this->input->post("contraseniaSuscriptor")));
					$where = array("idDatosUsuario" => $resExisteCodigoSeguridad[0]->idDatosUsuario);
					
					$banderaUpdatePassword = $this->M_DatosIniciarSesion->updateInformacionPerfil($datosUpdatePassword, $where);
					
					
					
					
					if($banderaUpdatePassword == 1) 
					{
						
						$datosUpdateDatosRecuperarContrasenia = array("banderaRecovery" => "1");
						$where = array("idRestaurarContrasenia" => $resExisteCodigoSeguridad[0]->idRestaurarContrasenia);
						
						$this->M_DatosIniciarSesion->updateDatosRecuperaContraseniaUsuario($datosUpdateDatosRecuperarContrasenia, $where);

						echo "<input class='form-control form-control-sm' id='banderaRecoveryPasswordChangePassword' name='banderaRecoveryPasswordChangePassword' value='TRUE' type='text'/>";
						$this->l_alertas->LA_ShowAlertas("¡Éxito!","Tu contraseña de modifico correctamente.","success");
					} 
					else 
					{
						$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, surgió un error al modificar tu contraseña","danger");
					}
				} 
				else 
				{
					
					$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, tu código de seguridad ha caducado. Intenta generardo un nuevo código y te lo enviamos por correo electrónico.","warning");
				}

			} 
			else 
			{
				$this->l_alertas->LA_ShowAlertas("¡Alerta!","El código de seguridad no coincide con el que se envío por correo electrónico. Favor de verificar.","warning");
			}

		} 
		else 
		{
			$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, surgió un error al modificar tu contraseña","warning");
		}
	}
}
?>
