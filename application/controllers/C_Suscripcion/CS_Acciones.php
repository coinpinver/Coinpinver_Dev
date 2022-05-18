<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CS_Acciones extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('L_Alertas');
		$this->load->library('L_Generales');
		$this->load->library('L_Correos');
		$this->load->model('M_DatosSuscripcion');
		$this->load->model('M_DatosSuscriptor');

	}

	public function CSA_SetSuscripcion() {

		if($this->input->post()) {
			$banderaSuscripcion = true;
			$banderaInsertSuscriptor = "NULL";
			$campo = "";
			$valorCampo = "";

			$numEmailSuscriptor = $this->M_DatosSuscripcion->getExisteEmailSuscriptor($this->input->post("emailSuscriptor"));

			if($numEmailSuscriptor <= 0) {
				$numusuarioSuscriptor = $this->M_DatosSuscripcion->getExisteUsuarioSuscriptor($this->input->post("usuarioSuscriptor"));
				
				if($numusuarioSuscriptor <= 0) {
					$hashSuscriptor = md5($this->input->post("usuarioSuscriptor"));
					$valoresInsertSuscriptor = array("nombreSuscriptor" => $this->input->post("nombreSuscriptor"),
										"apellidosSuscriptor" => $this->input->post("apellidosSuscriptor"),
										"emailSuscriptor" => $this->input->post("emailSuscriptor"),
										"usuarioSuscriptor" => $this->input->post("usuarioSuscriptor"),
										"contraseniaSuscriptor" => md5($this->input->post("contraseniaSuscriptor")),
										"hashSuscriptor" => $hashSuscriptor);
					$banderaInsertSuscriptor = $this->M_DatosSuscripcion->setSuscripcion($valoresInsertSuscriptor);

					if($banderaInsertSuscriptor == 1) {
						
						$resDatosSuscriptor = $this->M_DatosSuscriptor->getDatosGeneralesSuscriptor($hashSuscriptor);

						$valoresInsertConfirma = array("idSuscriptor" => $resDatosSuscriptor[0]->idSuscriptor,
														"codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
														"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
						$banderaInsertConfirma = $this->M_DatosSuscripcion->setDatosConfirmaSuscriptor($valoresInsertConfirma);

						if($banderaInsertConfirma == 1) {
							$this->l_correos->LC_EnviaConfirmaCuentaSuscriptor($hashSuscriptor);
							redirect("ConfirmaCuentaSuscriptor/" . $hashSuscriptor);
						}
					}

				} else {
					$campo = "nombre del usuario";
					$valorCampo = $this->input->post("usuarioSuscriptor");
					$banderaSuscripcion = false;
				}
			} else {
				$campo = "email";
				$valorCampo = $this->input->post("emailSuscriptor");
				$banderaSuscripcion = false;
			}

			if($banderaSuscripcion == false) {
				$datos["informacion"] = array("banderaInsert" => $banderaInsertSuscriptor,
											"campo" => $campo,
											"valorCampo" => $valorCampo);
				$datos["ubicacion_vista"] = "/V_Suscripcion/VS_ExisteSuscripcion"; 
				$this->load->view("Principal", $datos);
			}
		} else {
			redirect("Suscripcion");
		}
		
	}

	public function CSP_ReenviarConfirmarCuentaSuscriptor() {
		if($this->input->post()) {

			$resDatosConfirmacion = $this->M_DatosSuscripcion->getConfirmaSuscriptor($this->input->post("hashSuscriptor"));
			$banderageneraCodigoConfirma = 0;

			if(count($resDatosConfirmacion) >= 1) {

				if($resDatosConfirmacion[0]->banderaConfirma != null) {
					$datosUpdateDatosConfirmaSuscriptor = array("codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
																"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
					$where = array("idConfirmaSuscriptor" => $resDatosConfirmacion[0]->idConfirmaSuscriptor);

					$banderageneraCodigoConfirma = $this->M_DatosSuscripcion->updateDatosConfirmaSuscriptor($datosUpdateDatosConfirmaSuscriptor, $where);
				} else {
					$banderageneraCodigoConfirma = 1;
					$existDatosConfirmaSuscriptor = $this->M_DatosSuscripcion->getExistDatosConfirmaSuscriptor($this->input->post("hashSuscriptor"));

					if(count($existDatosConfirmaSuscriptor) <= 0) {
						$valoresInsertConfirma = array("idSuscriptor" => $resDatosConfirmacion[0]->idSuscriptor,
														"codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
														"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
						$banderageneraCodigoConfirma = $this->M_DatosSuscripcion->setDatosConfirmaSuscriptor($valoresInsertConfirma);
					}
				}
			} else {
				$banderageneraCodigoConfirma = 1;
				$existDatosConfirmaSuscriptor = $this->M_DatosSuscripcion->getExistDatosConfirmaSuscriptor($this->input->post("hashSuscriptor"));

				if(count($existDatosConfirmaSuscriptor) <= 0) {
					$valoresInsertConfirma = array("idSuscriptor" => $resDatosConfirmacion[0]->idSuscriptor,
													"codigoSeguridad" => $this->l_generales->CSA_GetCodigoSeguridadConfirma(),
													"fechaVenceCodigo" => $this->l_generales->CSA_GenerarFechaVencimientoCodigo());
					$banderageneraCodigoConfirma = $this->M_DatosSuscripcion->setDatosConfirmaSuscriptor($valoresInsertConfirma);
				}
			}

			if($banderageneraCodigoConfirma == 1) {
				$this->l_correos->LC_EnviaConfirmaCuentaSuscriptor($this->input->post("hashSuscriptor"));
				$this->l_alertas->LA_ShowAlertas("¡Éxito!","Se reenvío tu codigo de seguridad de confirmación de cuenta.","success");
			} else {
				$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al reenviar el correo electrónico. Intentalo mas tarde","danger");
			}

		} else {
			$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al reenviar el correo electrónico. Intentalo mas tarde","danger");
		}
	}

	public function CSP_SetConfirmarCuentaSuscriptor() {
		if($this->input->post()) {

			date_default_timezone_set("America/Mexico_City");

			$resDatosConfirmacion = $this->M_DatosSuscripcion->getConfirmaSuscriptor($this->input->post("hashSuscriptor"));

			if(count($resDatosConfirmacion) >= 1) {

				$fechaActual = date("d-m-Y H:i:s",strtotime(date("d-m-Y H:i:00")));
				$fechaVenceCodigo = date("d-m-Y H:i:s",strtotime($resDatosConfirmacion[0]->fechaVenceCodigo));
				
				if($fechaActual <= $fechaVenceCodigo) {

					if($this->input->post("codigoSeguridad") == $resDatosConfirmacion[0]->codigoSeguridad) {
						$datosUpdateDatosConfirmaSuscriptor = array("banderaConfirma" => "1");
						$where = array("idConfirmaSuscriptor" => $resDatosConfirmacion[0]->idConfirmaSuscriptor);
						
						$banderaUpdate = $this->M_DatosSuscripcion->updateDatosConfirmaSuscriptor($datosUpdateDatosConfirmaSuscriptor, $where);

						if($banderaUpdate == 1) {
							echo "<input class='form-control form-control-sm' id='banderaConfirmaCuenta' name='banderaConfirmaCuenta' value='TRUE' type='hidden'/>";
						} else {
							$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al confirmar tu cuenta. Intentalo mas tarde.","danger");
						}
					} else {
						$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, El código que ingresaste no es el correcto. Intenta generardo un nuevo código y te lo enviamos por correo electrónico.","warning");
					}
				} else {
					$this->l_alertas->LA_ShowAlertas("¡Alerta!","Lo sentimos, Tu código ha caducado, ya no es valido. Intenta generardo un nuevo código y te lo enviamos por correo electrónico.","warning");
				}
				
			} else {
				$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error verificar tu información. Intentalo mas tarde","danger");
			}
		}
	}

}
?>
