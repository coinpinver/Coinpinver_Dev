<!-- <section class="container d-flex bg-secondary align-items-center mb-lg-6 mb-sm-6 pt-lg-6 pt-sm-6 pb-md-4" style="flex: 1 0 auto;"> -->
<section class="bg-secondary overflow-hidden pt-5 pt-md-6 pt-lg-7 border-bottom">
	<div class="w-100 pt-3">
		<div class="container">
			
			<div class="row">
				<div class="col-12 col-sm-12 ">
					<div class="card card-horizontal">
						
						<div class="card-body">
							<form name="setPassword" id="setPassword" method="POST" action="<?=base_url("index.php/setPassword")?>" class="needs-validation" novalidate>
								<h5 class="card-title text-center">¡Se te olvidó tu contraseña?</h5>
								<p class="text-justify">Ingresa tu correo electrónico.</p>
								<div class="row align-items-center">
									<div class="col-12 col-md-6">
										<label for="emailUsuarioRec" class="form-label">Email:</label>
										<div class="input-group mb-3">
											<i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
											<input class="form-control form-control-sm rounded" type="email" id="emailUsuarioRec" name="emailUsuarioRec" placeholder="correo@dominio.com.mx" autocomplete="off" maxlength="45" required/>
										</div>
									</div>
									
								</div>
								

								<button type="submit" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
									<i class="ai-user-plus"></i> Recuperar
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
