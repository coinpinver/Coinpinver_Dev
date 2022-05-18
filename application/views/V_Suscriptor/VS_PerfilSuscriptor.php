<?php

$datosSuscriptor = $informacion["datosSuscriptor"];
$datosCatSexo = $informacion["datosCatSexo"];
$datosCatPais = $informacion["datosCatPais"];

?>
<script src="<?=base_url("js/JS_Suscriptor/JSS_ConfiguracionSuscriptor.js")?>?t=<?=time()?>"></script>
<div class="container">
	<div class="row">
		<div class="col-lg-4 mb-lg-0 mt-5">
			<div class="bg-light rounded-3 shadow-lg">
				<div class="px-4 py-4 mb-1 text-center">
					<img class="d-block rounded-circle img-avatar-perfil mx-auto my-2" src="<?=$_SESSION['rutaFotografiaSuscriptor']?>" at="<?=$datosSuscriptor["nombreSuscriptor"]?>" width="110">
					<h6 class="mb-0 pt-1"><?=$datosSuscriptor["nombreSuscriptor"]?></h6><span class="text-muted fs-sm">@<?=$datosSuscriptor["usuarioSuscriptor"]?></span>
				</div>
				<div class="d-lg-none px-4 pb-4 text-center">
					<a class="btn btn-primary px-5 mb-2" href="#account-menu" data-bs-toggle="collapse">
						<i class="ai-menu me-2"></i>Menú
					</a>
				</div>
				<div class="d-lg-block collapse pb-2" id="account-menu">
					<h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3">Configuracion de la cuenta</h3>
					<a class="d-flex align-items-center nav-link-style px-4 py-3" href="<?=base_url("index.php/PerfilSuscriptor")?>">
						<i class="ai-user fs-lg opacity-60 me-2"></i>Información de perfil
					</a>
					<a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="<?=base_url("index.php/CerrarSesion")?>">
						<i class="ai-log-out fs-lg opacity-60 me-2"></i>Salir
					</a>
				</div>
			</div>
		</div>


		<div class="col-lg-8 mt-5 mb-5">
			<div class="d-flex flex-column h-100 bg-light rounded-3 shadow-lg p-4">
				<div class="py-2 p-md-3">
					<form id="updateDatosSuscriptor" name="updateDatosSuscriptor" method="POST">
						<div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-start">
							<h1 class="h3 mb-2 text-nowrap">Información del perfil</h1>
							<!--<a class="btn btn-link text-danger fw-medium btn-sm mb-2" href="#">
								<i class="ai-trash-2 fs-base me-2"></i>Elimiar cuenta
							</a>-->
						</div>
						<div class="bg-secondary rounded-3 p-4 mb-4">
							<div class="d-block d-sm-flex align-items-center">
								<img class="d-block rounded-circle img-avatar-perfil mx-sm-0 mx-auto mb-3 mb-sm-0" src="<?=$_SESSION['rutaFotografiaSuscriptor']?>" alt="<?=$datosSuscriptor["nombreSuscriptor"]?>" width="110">
								<div class="ps-sm-3 text-center text-sm-start">
									<button class="btn btn-light shadow btn-sm mb-2" type="button" id="btn-change-photo">
										<i class="ai-refresh-cw me-2"></i>Cambiar fotografía
									</button>
									<div class="p mb-0 fs-ms text-muted">Sube una imagen JPG o PNG. Se requiere 300x300 px.</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
								<label class="form-label px-0" for="nombreSuscriptor">Nombre(s):</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">
										<i class="ai-pocket"></i>
									</span>
									<input type="text" name="nombreSuscriptor" id="nombreSuscriptor" value="<?=$datosSuscriptor["nombreSuscriptor"]?>" class="form-control form-control-sm" placeholder="Escribe tu nombre" autocomplete="off" maxlength="150" required="">
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
								<label class="form-label px-0" for="apellidosSuscriptor">Apellidos:</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">
										<i class="ai-pocket"></i>
									</span>
									<input type="text" name="apellidosSuscriptor" id="apellidosSuscriptor" value="<?=$datosSuscriptor["apellidosSuscriptor"]?>" class="form-control form-control-sm" placeholder="Escribe tu(s) apellido(s)" autocomplete="off" maxlength="150" required="">
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
								<label class="form-label px-0" for="emailSuscriptor">Email:</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">
										<i class="ai-mail"></i>
									</span>
									<input type="text" name="emailSuscriptor" id="emailSuscriptor" value="<?=$datosSuscriptor["emailSuscriptor"]?>" class="form-control form-control-sm" placeholder="correo@dominio.com.mx" required="" readonly="">
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
								<label class="form-label px-0" for="usuarioSuscriptor">Nombre de usuario:</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">
										<i class="ai-user"></i>
									</span>
									<input type="text" name="usuarioSuscriptor" id="usuarioSuscriptor" value="<?=$datosSuscriptor["usuarioSuscriptor"]?>" class="form-control form-control-sm" placeholder="Nombre de usuario" required="" readonly="">
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
								<label class="form-label px-0" for="idSexo">Sexo:</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">
										<i class="ai-smile"></i>
									</span>
									<select name="idSexo" id="idSexo" class="form-select">
										<option value="NULL">Selecciona una opción</option>
										<?php
											for($x = 0; $x < count($datosCatSexo); $x++) {
												echo "<option value='" . $datosCatSexo[$x]["idSexo"] . "' " . $datosCatSexo[$x]["select"] . " >" . $datosCatSexo[$x]["descripSexo"] . "</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
								<label class="form-label px-0" for="telefonoSuscriptor">Telefono:</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">
										<i class="ai-phone"></i>
									</span>
									<input type="text" name="telefonoSuscriptor" id="telefonoSuscriptor" value="<?=$datosSuscriptor["telefonoSuscriptor"]?>" class="form-control form-control-sm" placeholder="Escribe tu número telefónico" autocomplete="off" maxlength="15" required="">
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
								<label class="form-label px-0" for="idPais">País:</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">
										<i class="ai-flag"></i>
									</span>
									<select name="idPais" id="idPais" class="form-select">
										<option value="NULL">Selecciona una opción</option>
										<?php
											for($x = 0; $x < count($datosCatPais); $x++) {
												echo "<option value='" . $datosCatPais[$x]["idPais"] . "' " . $datosCatPais[$x]["select"] . " > " . $datosCatPais[$x]["clavePais"] . " - " . $datosCatPais[$x]["descripPais"] . "</option>";
											}
										?>
									</select>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-sm-12">
								<button id="btn-update-data-suscriptor" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100" type="button">
									<i class="ai-save"></i> Guardar cambios
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="result-update-data-suscriptor"></div>

<div class="modal fade" id="modalFormChangePhoto" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<form id="cambiaFotografiaSuscriptor" enctype='multipart/form-data' method="POST">
					<h4 class="mt-2 text-center">Modifica tu fotografía</h4>
					<div class="row">
						<div class="col-12 mt-2 mb-4">
							<label for="fotoSuscriptor" class="form-label">Selecciona una imagen (*.jpg, *.png) (Max 5Mb)</label>
							<input class="form-control form-control-sm" type="file" name="fotoSuscriptor" id="fotoSuscriptor" accept=".png, .jpg,">
						</div>
					</div>

					<div class="row align-items-center text-center mb-4 oculto" id="preview-photo">
						<span class="fs-ms">Previsualización de la fotografía</span>
						<div id="photo-tmp"></div>
					</div>

					<div id="result-confirma"></div>

					<div class="row">
						<div class="col-sm-12">
							<button id="btn-update-fotografia-suscriptor" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100" type="button">
								<i class="ai-refresh-cw"></i> Cambiar fotografía
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.img-avatar-perfil {
		height: 7.5rem;
		width: 7.5rem;
		border-radius: 50%;
		margin-right: 10px;
	}
</style>
