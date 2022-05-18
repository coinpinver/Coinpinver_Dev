<!-- <section class="container d-flex bg-secondary align-items-center mb-lg-6 mb-sm-6 pt-lg-6 pt-sm-6 pb-md-4" style="flex: 1 0 auto;"> -->
<section class="bg-secondary overflow-hidden pt-5 pt-md-6 pt-lg-7 border-bottom">
	<div class="w-100 pt-3">
		<div class="container">
			
			<div class="row">
				<div class="col-12 col-sm-12 ">
					<div class="card card-horizontal">
						
						<div class="card-body">
							<form name="setUsuario" id="setUsuario" method="POST" action="<?=base_url("index.php/setUsuario")?>" class="needs-validation" novalidate>
								<h5 class="card-title text-center">Únete a Coinpinver</h5>
								<p class="text-justify">Captura los siguientes datos por favor.</p>
								<div class="row">
									<div class="col-md-6">
										<label for="aliasUsuario" class="form-label">Nombre de usuario:</label>
										<div class="input-group input-group-sm mb-3">
											<i class="ai-user position-absolute top-50 start-0 translate-middle-y ms-3"></i>
											<input class="form-control rounded-start" type="text" id="aliasUsuario" name="aliasUsuario" placeholder="Nombre de usuario" autocomplete="off" maxlength="40" required/>
											<button type="button" class="btn btn-translucent-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"  title="Instrucciones" data-bs-content="El nombre de usuario debe contener letras (a-z,A-Z), tambien números (0-9) y opcionales guion bajo (_) y punto (.).">
												<i class="ai-help-circle"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<label for="emailUsuario" class="form-label">Email:</label>
										<div class="input-group mb-3">
											<i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
											<input class="form-control form-control-sm rounded" type="email" id="emailUsuario" name="emailUsuario" placeholder="correo@dominio.com.mx" autocomplete="off" maxlength="45" required/>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
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
									<div class="col-md-6">
										<label for="vscsContraseniaConfir" class="form-label">Confirmar contraseña:</label>
										<div class="input-group input-group-sm">
											<i class="ai-key position-absolute top-50 start-0 translate-middle-y ms-3"></i>
											<input class="form-control rounded-start" type="password" id="vscsContraseniaConfir" name="vscsContraseniaConfir" placeholder="***********" autocomplete="off" maxlength="14" required/>
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
								</div>

								<button type="submit" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
									<i class="ai-user-plus"></i> Registrarse
								</button>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<br>
</section>
<script src="<?=base_url("js/JS_IniciarSesion/JSIS_IniciarSesion.js")?>?t=<?=time()?>"></script>
