<script src="<?=base_url("js/JS_IniciarSesion/JSIS_Sesion.js")?>?t=<?=time()?>"></script>
<div class="d-none d-md-block position-absolute w-50 h-100 bg-size-cover" style="z-index: -100000; top: 0; right: 0; background-image: url(<?=base_url("img/coinpinver/InicioSesion/emprendedores.jpg")?>);"></div>
<style>
	.fullHeight
	{
		/*height: 84.5vh;*/
	}
</style>

<div class="fullHeight">

	<section class="container d-flex align-items-center mb-lg-6 mb-sm-6 pt-lg-6 pt-sm-6 pb-md-4 position-relative" style="flex: 1 0 auto;">
		<div class="w-100 pt-3">
			<div class="row">
				<div class="col-lg-4 col-md-6 offset-lg-1">
					<div class="view show" id="signin-view">
						<h1 class="h2">Iniciar Sesión</h1>
						<p class="fs-ms text-muted mb-4 text-justify">Inicie sesión en su cuenta utilizando el usuario o correo electrónico y la contraseña proporcionados durante el registro.</p>
						<form id="iniciarSesion" name="iniciarSesion" method="POST">
							<div class="input-group input-group-sm mb-3">
								<i class="ai-user position-absolute top-50 start-0 translate-middle-y ms-3"></i>
								<input id="userMail" name="userMail" class="form-control rounded" type="email" placeholder="Usuario o correo electrónico" maxlength="50">
							</div>
							<div class="input-group input-group-sm mb-3">
								<i class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
								<div class="password-toggle w-100">
									<input id="password" name="password" class="form-control form-control-sm" type="password" placeholder="Contraseña" maxlength="14">
									<label class="password-toggle-btn" aria-label="Show/hide password">
										<input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
									</label>
								</div>
							</div>
							<div class="d-flex justify-content-between align-items-center mb-3 pb-1">
								<div class="form-check"></div>
								<a class="nav-link-style fs-ms" href="<?=base_url("index.php/Recuperar-Contrasenia")?>">¿Se te olvidó tu contraseña?</a>
							</div>
							<button type="button" id="btn-login" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100">
								<i class="ai-log-in"></i> Ingresar
							</button>
							<p class="fs-sm pt-3 mb-0">¿No tienes una cuenta? <a href="<?=base_url("index.php/RegistroUsuario")?>" class="fw-medium" data-view="#signup-view">Registrate</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div id="result-login"></div>
</div>
