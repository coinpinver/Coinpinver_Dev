<link rel="stylesheet" media="screen" href="<?=base_url("css/CSS_Suscripcion/CSSS_CapturaSuscripcion.css")?>?t=<?=time()?>">
<script src="<?=base_url("js/JS_Suscripcion/JSS_CapturaSuscripcion.js")?>?t=<?=time()?>"></script>

<div class="container-fluid mb-5 mt-5">
	<div class="row">
		<div class="col-xl-10 col-md-10 offset-xl-1 offset-md-1 col-12">
			<div class="card card-horizontal">
				<div class="card-img-top img-contacto"></div>
				<div class="card-body">
					<form name="setSuscripcion" id="setSuscripcion" method="POST" action="<?=base_url("index.php/setSuscripcion")?>" class="needs-validation" novalidate>
						<h5 class="card-title text-center">Únete a Coinpinver <?=@$alertaCampo?></h5>
						<p class="text-justify">Forma parte de nuestra comunidad de emprendedores. Captura los datos que se te solicitan y suscribete.</p>

						<div class="row">
							<div class="col-md-6">
								<label for="nombreSuscriptor" class="form-label">Nombre:</label>
								<div class="input-group mb-3">
									<i class="ai-pocket position-absolute top-50 start-0 translate-middle-y ms-3"></i>
									<input class="form-control form-control-sm rounded" type="text" id="nombreSuscriptor" name="nombreSuscriptor" placeholder="Escribe tu nombre" autocomplete="off" maxlength="150" required/>
								</div>
							</div>
							<div class="col-md-6">
								<label for="apellidosSuscriptor" class="form-label">Apellidos:</label>
								<div class="input-group mb-3">
									<i class="ai-pocket position-absolute top-50 start-0 translate-middle-y ms-3"></i>
									<input class="form-control form-control-sm rounded" type="text" id="apellidosSuscriptor" name="apellidosSuscriptor" placeholder="Escribe tu(s) apellido(s)" autocomplete="off" maxlength="150" required/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="emailSuscriptor" class="form-label">Email:</label>
								<div class="input-group mb-3">
									<i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
									<input class="form-control form-control-sm rounded" type="email" id="emailSuscriptor" name="emailSuscriptor" placeholder="correo@dominio.com.mx" autocomplete="off" maxlength="50" required/>
								</div>
							</div>
							<div class="col-md-6">
								<label for="emailSuscriptor" class="form-label">Nombre de usuario:</label>
								<div class="input-group input-group-sm mb-3">
									<i class="ai-user position-absolute top-50 start-0 translate-middle-y ms-3"></i>
									<input class="form-control rounded-start" type="text" id="usuarioSuscriptor" name="usuarioSuscriptor" placeholder="Nombre de usuario" autocomplete="off" maxlength="20" required/>
									<button type="button" class="btn btn-translucent-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"  title="Instrucciones" data-bs-content="El nombre de usuario debe contener letras (a-z,A-Z), tambien números (0-9) y opcionales guion bajo (_) y punto (.).">
										<i class="ai-help-circle"></i>
									</button>
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
						</div>

						<button type="submit" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
							<i class="ai-user-plus"></i> Suscribirse
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>