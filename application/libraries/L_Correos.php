<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class L_Correos
{
	function __construct() {
		$this->ci =& get_instance();
		$this->ci->load->library('email');
		$this->ci->load->database();
		$this->ci->load->model('M_DatosSuscripcion');
		$this->ci->load->model('M_DatosIniciarSesion');
		$this->ci->load->model('M_DatosIniciarSesionUsuario');
	}

	public function LC_EnviaRecuperaContraseniaSuscriptor($hashSuscriptor) {
		
		$estiloH2 = $this->LC_GetEstilosCorreos("h2");

		$tituloCorreo = "Envío de codigo de seguridad";
		$asunto = "Recuperación de contraseña";

		$resDatosGeneralesSuscriptor = $this->ci->M_DatosIniciarSesion->getdatosGeneralesRecoveryPasswordSuscriptor($hashSuscriptor);
		$contenidoCentral = "<center>
								<table width='100%' border='0'>
									<tr>
										<td align='center'>
											<h2 style='" . $estiloH2 . "'>" . $tituloCorreo . "</h2>
										</td>
									</tr>
									<tr>
										<td align='justify'>
											<p>Hola <strong>" . $resDatosGeneralesSuscriptor[0]->usuarioSuscriptor . "</strong>.</p>
											<p>Solicitaste recuperar tu contraseña para ingresar en Coinpinver. Ingresa el siguiente código de seguridad para culminar tu proceso.</p>
										</td>
									</tr>
									<tr>
										<td align='center'>
											<h3 style='" . $estiloH2 . "'>CRP-" . $resDatosGeneralesSuscriptor[0]->codigoSeguridad . "</3>
										</td>
									</tr>
								</table>
							</center>";

		$emails = $resDatosGeneralesSuscriptor[0]->emailSuscriptor;
		$this->LC_EnviaCorreosCoinpinver($asunto,$contenidoCentral,$emails);
	}

	public function LC_EnviaConfirmaCuentaUsuario($hashSuscriptor) {
		
		$estiloH2 = $this->LC_GetEstilosCorreos("h2");

		$tituloCorreo = "Verifica tu correo electrónico";
		$asunto = "Verificación de correo electrónico";

		$resDatosGeneralesUsuario = $this->ci->M_DatosIniciarSesionUsuario->getdatosGeneralesConfirmaUsuario($hashSuscriptor);

		$contenidoCentral = "<center>
								<table width='100%' border='0'>
									<tr>
										<td align='center'>
											<h2 style='" . $estiloH2 . "'>" . $tituloCorreo . "</h2>
										</td>
									</tr>
									<tr>
										<td align='justify'>
											<p>Hola <strong>" . $resDatosGeneralesUsuario[0]->userControlUsuario . "</strong>.</p>
											<p>Ya casi eres miembro de nuestra comunidad. Verifica tu correo ingresando este código para completar la configuración de tu suscripción a Coinpinver.</p>
										</td>
									</tr>
									<tr>
										<td align='center'>
											<h3 style='" . $estiloH2 . "'>CP-" . $resDatosGeneralesUsuario[0]->codigoSeguridad . "</3>
										</td>
									</tr>
								</table>
							</center>";

		$emails = $resDatosGeneralesUsuario[0]->emailUsuario;
		$this->LC_EnviaCorreosCoinpinver($asunto,$contenidoCentral,$emails);
	}

	/*public function LC_EnviaCorreosCoinpinver($asunto,$contenidoCentral,$emails) {

		$estiloCuerpo = $this->LC_GetEstilosCorreos("cuerpo");
		$estiloLetra = $this->LC_GetEstilosCorreos("letra");
		$estiloHr = $this->LC_GetEstilosCorreos("hr");
		$estiloLink = $this->LC_GetEstilosCorreos("link");
		$estilosFontMediumSmall = $this->LC_GetEstilosCorreos("fontMediumSmall");
		$estilosCardInfo = $this->LC_GetEstilosCorreos("cardInfo");
		
		$cabeceras="From: contacto@coinpinver.com.mx\r\nContent-type: text/html\r\n";

		$contenidoCorreo="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
							<html xmlns='http://www.w3.org/1999/xhtml'>
							<head>
								<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />	
							</head>	
							<body style='" . $estiloCuerpo . $estiloLetra . "'>
								<center>
									<table width='100%' border='0'>
										<tr>
											<td width='100%' align='center'>.
												<img src='" . base_url("img/coinpinver/Correos/Coinpinver.png") . "?t=" .time(). "'></img>
											</td>
										</tr>
									</table>
								</center>
								
								<br><hr style='" . $estiloHr . "'><br>
								
								$contenidoCentral

								<br><hr style='" . $estiloHr . "'><br>

								<center>
									<table width='100%' border='0'>
										<tr>
											<td width='15%' align='center'>
												<img src='" . base_url("img/coinpinver/Correos/contactanos.png") . "?t=" .time(). "'></img>
											</td>
											<td width='100%' align='justify'>
												<p><strong>¿Alguna pregunta o necesita ayuda?</strong></p>
												<p>Envíenos un correo electrónico a <a href='mailto:contacto@coinpinver.com.mx' style='" . $estiloLink . "'>contacto@coinpinver.com.mx</a></p>
											</td>
										</tr>
									</table>
								</center>

								<br><hr style='" . $estiloHr . "'><br>

									<div style='" . $estilosCardInfo . $estilosFontMediumSmall . "'>

										<table width='100%' border='0'>
											<tr>
												<td width='70%' align='center'></td>
												<td width='10%' align='center'>
													<a href='https://www.facebook.com/CoinPinver_Criptomonedas-110854660735816/' target='_blank'><img src='" . base_url("img/coinpinver/Correos/facebook.png") . "?t=" .time(). "'></img></a>
												</td>
												<td width='10%' align='center'>
													<a href='https://instagram.com/coinpinver_criptomonedas?igshid=118izpe7yl5wa' target='_blank'><img src='" . base_url("img/coinpinver/Correos/instagram.png") . "?t=" .time(). "'></img></a>
												</td>
												<td width='10%' align='center'>
													<a href='https://youtube.com/channel/UCXpel7u479amgsaTbdKC-BQ' target='_blank'><img src='" . base_url("img/coinpinver/Correos/youtube.png") . "?t=" .time(). "'></img></a>
												</td>
											</tr>
											<tr>
												<td width='100%' align='justify' colspan='4'>
													<p><strong>© 2021 Coinpinver. Todos los derechos reservados.</strong></p>
													<p>Este mensaje de correo electrónico y cualquier archivo adjunto son confidenciales. Se prohíbe la difusión, distribución o copia de este correo electrónico o cualquier adjunto por cualquier persona que no sea el destinatario previsto. Si no es el destinatario previsto, notifique a Coinpinver inmediatamente poniéndose en contacto con <a href='mailto:contacto@coinpinver.com.mx' style='" . $estiloLink . "'>contacto@coinpinver.com.mx</a> y destruya todas las copias de este correo electrónico y todos los archivos adjuntos.</p>
												</td>
											</tr>
										</table>
							
									</div>
								
							</body>
						</html>";
		mail($emails,$asunto,$contenidoCorreo,$cabeceras) or die("Existe un error al enviar el correo Electrónico");
	}*/

	public function LC_EnviaCorreosCoinpinver($asunto,$contenidoCentral,$emails) {
		
		$estiloCuerpo = $this->LC_GetEstilosCorreos("cuerpo");
		$estiloLetra = $this->LC_GetEstilosCorreos("letra");
		$estiloHr = $this->LC_GetEstilosCorreos("hr");
		$estiloLink = $this->LC_GetEstilosCorreos("link");
		$estilosFontMediumSmall = $this->LC_GetEstilosCorreos("fontMediumSmall");
		$estilosCardInfo = $this->LC_GetEstilosCorreos("cardInfo");

		$config["mailtype"] = "html";
		$this->ci->email->initialize($config);
		$this->ci->email->from("contacto@coinpinver.com.mx", "Coinpinver");
		$this->ci->email->to($emails);
		$this->ci->email->subject($asunto);

		$contenidoCorreo="<html xmlns='http://www.w3.org/1999/xhtml'>
							<head>
								<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />	
							</head>	
							<body style='" . $estiloCuerpo . $estiloLetra . "'>
								<center>
									<table width='100%' border='0'>
										<tr>
											<td width='100%' align='center'>
												<img src='" . base_url("img/coinpinver/Correos/Coinpinver.png") . "?t=" .time(). "'></img>
											</td>
										</tr>
									</table>
								</center>
								
								<br><hr style='" . $estiloHr . "'><br>
								
								$contenidoCentral

								<br><hr style='" . $estiloHr . "'><br>

								<center>
									<table width='100%' border='0'>
										<tr>
											<td width='15%' align='center'>
												<img src='" . base_url("img/coinpinver/Correos/contactanos.png") . "?t=" .time(). "'></img>
											</td>
											<td width='100%' align='justify'>
												<p><strong>¿Alguna pregunta o necesita ayuda?</strong></p>
												<p>Envíenos un correo electrónico a <a href='mailto:contacto@coinpinver.com.mx' style='" . $estiloLink . "'>contacto@coinpinver.com.mx</a></p>
											</td>
										</tr>
									</table>
								</center>

								<br><hr style='" . $estiloHr . "'><br>

									<div style='" . $estilosCardInfo . $estilosFontMediumSmall . "'>

										<table width='100%' border='0'>
											<tr>
												<td width='70%' align='center'></td>
												<td width='10%' align='center'>
													<a href='https://www.facebook.com/CoinPinver_Criptomonedas-110854660735816/' target='_blank'><img src='" . base_url("img/coinpinver/Correos/facebook.png") . "?t=" .time(). "'></img></a>
												</td>
												<td width='10%' align='center'>
													<a href='https://instagram.com/coinpinver_criptomonedas?igshid=118izpe7yl5wa' target='_blank'><img src='" . base_url("img/coinpinver/Correos/instagram.png") . "?t=" .time(). "'></img></a>
												</td>
												<td width='10%' align='center'>
													<a href='https://youtube.com/channel/UCXpel7u479amgsaTbdKC-BQ' target='_blank'><img src='" . base_url("img/coinpinver/Correos/youtube.png") . "?t=" .time(). "'></img></a>
												</td>
											</tr>
											<tr>
												<td width='100%' align='justify' colspan='4'>
													<p><strong>© 2021 Coinpinver. Todos los derechos reservados.</strong></p>
													<p>Este mensaje de correo electrónico y cualquier archivo adjunto son confidenciales. Se prohíbe la difusión, distribución o copia de este correo electrónico o cualquier adjunto por cualquier persona que no sea el destinatario previsto. Si no es el destinatario previsto, notifique a Coinpinver inmediatamente poniéndose en contacto con <a href='mailto:contacto@coinpinver.com.mx' style='" . $estiloLink . "'>contacto@coinpinver.com.mx</a> y destruya todas las copias de este correo electrónico y todos los archivos adjuntos.</p>
												</td>
											</tr>
										</table>
							
									</div>
								
							</body>
						</html>";

		$this->ci->email->message($contenidoCorreo);

		//$this->ci->email->send();
		if(!$this->ci->email->send()) {
			echo "Error al enviar el correo";
		}
	}


	public function LC_GetEstilosCorreos($tipoEstilo) {
		$estilos = "";

		switch ($tipoEstilo) {
			case 'cuerpo':
				$estilos = "margin-left: 10%; margin-right: 10%; color: #737491;";
			break;

			case 'hr':
				$estilos = "border: 1px solid #dbdbdc;";
			break;

			case 'h1': case 'h2': case 'h3': case 'h4': case 'h5':
				$estilos = "font-weight: 600; color: #4a4b65;";
			break;

			case 'letra':
				$estilos = "font-family: Inter, sans-serif;";
			break;

			case 'btn':
				$estilos = "display: inline-block; font-weight: 500; line-height: 1.5; text-align: center; white-space: nowrap; vertical-align: middle; cursor: pointer; background-color: transparent; border: 1px solid transparent; padding: .5625rem 1.25rem; font-size: 1rem; border-radius: .75rem;";
			break;

			case 'btnSuccess':
				$estilos = "color: #FFFFFF; background-color: #16c995; border-color: #16c995; box-shadow: unset;";
			break;

			case 'link':
				$estilos = "color: #16c995; text-decoration: none; font-weight: bold;";
			break;

			case 'cardInfo':
				$estilos = "padding: 0.850rem; background-color: #e1ebfd; border-radius: 10px;";
			break;

			case 'fontMediumSmall':
				$estilos = "font-size: .8125rem !important;";
			break;
		}

		return $estilos;
	}
	public function LC_EnviaRecuperaContraseniaUsuario($hashUsuario) {
		
		$estiloH2 = $this->LC_GetEstilosCorreos("h2");

		$tituloCorreo = "Envío de codigo de seguridad";
		$asunto = "Recuperación de contraseña";

		$resDatosGeneralesSuscriptor = $this->ci->M_DatosIniciarSesion->getdatosGeneralesRecoveryPasswordUsuario($hashUsuario);
		$contenidoCentral = "<center>
								<table width='100%' border='0'>
									<tr>
										<td align='center'>
											<h2 style='" . $estiloH2 . "'>" . $tituloCorreo . "</h2>
										</td>
									</tr>
									<tr>
										<td align='justify'>
											<p>Hola <strong>" . $resDatosGeneralesSuscriptor[0]->userControlUsuario . "</strong>.</p>
											<p>Solicitaste recuperar tu contraseña para ingresar en Coinpinver. Ingresa el siguiente código de seguridad para culminar tu proceso.</p>
										</td>
									</tr>
									<tr>
										<td align='center'>
											<h3 style='" . $estiloH2 . "'>CRP-" . $resDatosGeneralesSuscriptor[0]->codigoSeguridad . "</3>
										</td>
									</tr>
								</table>
							</center>";

		$emails = $resDatosGeneralesSuscriptor[0]->emailUsuario;
		$this->LC_EnviaCorreosCoinpinver($asunto,$contenidoCentral,$emails);
	}
	
}
?>