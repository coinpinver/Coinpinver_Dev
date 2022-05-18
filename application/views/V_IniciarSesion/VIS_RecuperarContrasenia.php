<script src="<?=base_url("js/JS_IniciarSesion/JSIS_RecuperarContrasenia.js")?>?t=<?=time()?>"></script>

<div class="container py-3 py-sm-4 py-md-5">
	<div class="row justify-content-center">
		<div class="col-lg-7 col-md-9 col-sm-11">
			<div class="card border-0 shadow card-hover">
				<div class="card-body">
					<h5 class="card-title">¿Olvidaste tu contraseña?</h5>
					<p class="fs-sm">Cambia tu contraseña en tres sencillos pasos. Esto ayuda a mantener segura tu nueva contraseña.</p>
					<ul class="list-unstyled fs-sm pb-1 mb-1">
						<li id="step1RecoceryPassword" class="text-warning">
							<i id="step1RecoceryPasswordIcon" class="fs-md ai-alert-circle"></i>
							Escribe tu correo electrónico o nombre de usuario con el que te registraste en Coinpinver.
						</li>
						<li id="step2RecoceryPassword" class="text-danger">
							<i id="step2RecoceryPasswordIcon" class="fs-md ai-x-circle"></i>
							Te enviaremos un código temporal por correo electrónico, tendrá una vigencia de 10 min.
						</li>
						<li id="step3RecoceryPassword" class="text-danger">
							<i id="step3RecoceryPasswordIcon" class="fs-md ai-x-circle"></i>
							Crea una nueva contraseña y verificala.
						</li>
					</ul>
					<hr class="mb-2 mt-2"><br>
					<form id="restaurarContraseniaSuscriptor" name="restaurarContraseniaSuscriptor" method="POST">
						
						<div class="row" id="step1RecoceryPasswordContainer">
							<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 offset-md-2 offset-lg-2 offset-xl-2">
								<label for="emailSuscriptor" class="form-label">Ingresa tu correo electrónico o nombre de usuario:</label>
								<div class="input-group mb-3">
									<i class="ai-shield position-absolute top-50 start-0 translate-middle-y ms-3"></i>
									<input id="userMail" name="userMail" class="form-control form-control-sm rounded" type="email" placeholder="Usuario o correo electrónico" maxlength="50">
								</div>
							</div>

							<div class="col-12">
								<button type="button" id="btn-action" value-step="step2RecoceryPassword" value-position="1" value-element="enviar-codigo-seguridad" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100">
									<i class="ai-send"></i> Enviar código de seguridad
								</button>
							</div>
						</div>

						<div class="row oculto" id="step2RecoceryPasswordContainer">
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 offset-md-3 offset-lg-3 offset-xl-3">
								<label for="codigoSeguridad" class="form-label">Ingresa el código de seguridad</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">CRP -</span>
									<input type="text" name="codigoSeguridad" id="codigoSeguridad" class="form-control form-control-sm" placeholder="******" maxlength="6">
								</div>
							</div>
							
							<div class="col-12">
								<div class="row">
									<div class="col-6">
										<button type="button" id="btn-action" value-step="step1RecoceryPassword" value-position="1" value-element="return-step" class="btn btn-outline-warning btn-translucent-warning btn-sm btn-icon d-block w-100">
											<i class="ai-arrow-left"></i> Regresar
										</button>
									</div>
									<div class="col-6">
										<button type="button" id="btn-action" value-step="step3RecoceryPassword" value-position="2" value-element="validar-codigo-seguridad" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100">
											<i class="ai-check-square"></i> Validar código de seguridad
										</button>
									</div>
								</div>
							</div>
						</div>

						<div class="row oculto" id="step3RecoceryPasswordContainer">
							<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="vscsContrasenia" class="form-label">Contraseña:</label>
									<div class="input-group input-group-sm">
										<i class="ai-key position-absolute top-50 start-0 translate-middle-y ms-3"></i>
										<input class="form-control rounded-start" type="password" id="vscsContrasenia" name="vscsContrasenia" placeholder="***********" autocomplete="off" maxlength="14" required/>
										<button type="button" class="btn btn-translucent-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" title="Instrucciones" data-bs-content="La contraseña debe contener entre 8-14 caracteres, utilizar una combinación de letras mayúsculas, minúsculas, números y signos especiales como: #$%=¿?_+-[]{}()">
											<i class="ai-help-circle"></i>
										</button>
									</div>
									<div class="form-group margin-dato-mensaje-suscription oculto" id="bar-password">
										<span class="progress-label text-info" id="text-valid-password"></span>
										<div class="progress progress-xs mb-3">
											<div id="valid-password" class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="contraseniaSuscriptor" class="form-label">Confirmar contraseña:</label>
									<div class="input-group input-group-sm">
										<i class="ai-key position-absolute top-50 start-0 translate-middle-y ms-3"></i>
										<input class="form-control rounded-start" type="password" id="contraseniaSuscriptor" name="contraseniaSuscriptor" placeholder="***********" autocomplete="off" maxlength="14" required/>
										<button type="button" class="btn btn-translucent-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" title="Instrucciones" data-bs-content="La contraseña debe contener entre 8-14 caracteres, utilizar una combinación de letras mayúsculas, minúsculas, números y signos especiales como: #$%=¿?_+-[]{}()">
											<i class="ai-help-circle"></i>
										</button>
									</div>
									<div class="form-group margin-dato-mensaje-suscription oculto" id="bar-check-password">
										<span class="progress-label text-warning" id="text-valid-check-password"></span>
										<div class="progress progress-xs mb-3">
											<div id="valid-check-password" class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>

								<div class="col-12 mt-3">
									<div class="row">
										<div class="col-6">
											<button type="button" id="btn-action" value-step="step2RecoceryPassword" value-position="2" value-element="return-step" class="btn btn-outline-warning btn-translucent-warning btn-sm btn-icon d-block w-100">
												<i class="ai-arrow-left"></i> Regresar
											</button>
										</div>
										<div class="col-6">
											<button type="button" id="btn-action" value-step="step4RecoceryPassword" value-position="3" value-element="cambiar-contrasenia" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100">
												<i class="ai-lock"></i> Cambiar contraseña
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row oculto" id="step4RecoceryPasswordContainer">
							<div class="col-12">
								<br>
								<p class="fs-sm">Tu contraseña se ha reestablecido correctamente. Ingresa a tu cuenta para validar tu nueva contraseña</p>
								<br>
								<a href="<?=base_url("index.php/CerrarSesion")?>" id="btn-action" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100">
									<i class="ai-log-in"></i> Iniciar Sesion
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="oculto">
	<input class="form-control rounded-start oculto" type="text" id="value-element" name="value-element"/>
	<input class="form-control rounded-start oculto" type="text" id="value-step" name="value-step"/>
	<input class="form-control rounded-start oculto" type="text" id="value-position" name="value-position"/>
	<div id="result-recovery-password"></div>
</div>
<script>
	$(function()
	{
		$("button[id=btn-action]").click(function() {
			setActionRecoveryAction(this);
		});
	});
</script>