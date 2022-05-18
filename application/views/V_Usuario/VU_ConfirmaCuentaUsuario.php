<style type="text/css">
	.img-existe-suscripcion {
		background-image: url('<?=base_url("/img/coinpinver/Suscripcion/confirmaCuentaSuscriptor.jpg")?>');
	}
</style>

<script src="<?=base_url("js/JS_Suscripcion/JSS_ConfirmaCuentaSuscriptor.js")?>?t=<?=time()?>"></script>

<div class="container-fluid mb-5 mt-5">
	<div class="row">
		<div class="col-xl-10 col-md-10 offset-xl-1 offset-md-1 col-12">
			<div class="card card-horizontal">
				<div class="card-img-top img-existe-suscripcion"></div>
				<div class="card-body">
					<form id="confirmaCuentaSuscriptor" name="confirmaCuentaSuscriptor" method="POST">
						<input type="hidden" name="hashSuscriptor" id="hashSuscriptor" class="form-control form-control-sm oculto" value="<?=$informacion['hashSuscriptor']?>">
						<?php if($informacion["banderaConfirma"] == 0) { ?>
							<p class="text-justify fs-3">¡Hola <strong><?=$informacion["datosSuscriptor"]["nombreSuscriptor"]?>!</strong>!</p>
							<p class="text-justify">Ya falta poco para formar parte de nuestra comunidad. Te enviamos un correo electrónico con un código de seguridad para confirmar tu cuenta y disfrutar de nuestro contenido.</p>

							<br>

							<div class="col-xl-6 col-md-6 col-sm-12 col-xs-12 offset-xl-3 offset-md-3">
								<label for="codigoSeguridad" class="form-label">Ingresa el código de seguridad</label>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">CP -</span>
									<input type="text" name="codigoSeguridad" id="codigoSeguridad" class="form-control form-control-sm" placeholder="******" maxlength="6">
								</div>
							</div>

							<p class="text-center fs-ms">¿Aún no te llega el correo? o ¿necesitas un nuevo código? <span class="text-info cursor" id="enviar-correo-confirmacion">Reenviar</span>.</p>

							<br>

							<button type="button" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3" id="btn-confirma-cuenta">
								<i class="ai-check-square"></i> Verificar cuenta
							</button>
						<?php } else {?>

							<p class="text-justify fs-3">¡Felicidades!</strong>!</p>

							<p class="text-justify">Tu cuenta ya ha sido verificada. Ingresa con tus credenciales para seguir disfrutando de nuestro contenido y ser parte de nuestra comunidad.</p>

							<a href="<?=base_url("index.php/IniciarSesion")?>" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
								<i class="ai-check-square"></i> Iniciar Sesión
							</a>

						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if($informacion["banderaConfirma"] == 1) { ?>
	<div class="mb-6 mt-6">1</div>
<?php } ?>
<div id="result-confirma"></div>

<!--<script type="text/javascript">
	$(function() {
		$("#enviar-correo-confirmacion").click(function() {
			setCorreoConfirma();
		});

		$("#btn-confirma-cuenta").click(function() {
			validaFormConfirmaCuenta();
		});
	});

	function validaFormConfirmaCuenta() {
		if($("#codigoSeguridad").val().length >= 1) {
			Accion_JQuery("confirmaCuentaSuscriptor", "SetConfirmaCuentaSuscriptor", "result-confirma", "Validando tu información", "Estamos validando tu cuenta", 1);
		} else {
			showNotification("!Alerta¡", "El campo <strong>Código de seguridad</strong> esta vacio. Favor de llenarlo", "warning");
		}
	}

	function setCorreoConfirma() {
		Accion_JQuery("confirmaCuentaSuscriptor", "ReenviarConfirmaCuentaSuscriptor", "result-confirma", "Reenviando correo electrónico", "Ingresa a tu correo electrónico para visualizar tu codigo se seguridad", 1);
	}

	function recargaDatos() {
		var banderaReenviaCorreo = $("#banderaReenviaCorreo").val();
		var banderaConfirmaCuenta = $("#banderaConfirmaCuenta").val();


		if(typeof(banderaReenviaCorreo) !== "undefined") {
			if(banderaReenviaCorreo === "FALSE-NO-EXIST") {
				window.location.replace(base_url + "index.php/IniciarSesion");
			}
		}

		if(typeof(banderaConfirmaCuenta) !== "undefined") {
			if(banderaConfirmaCuenta === "TRUE") {
				window.location.replace(base_url + "index.php/ConfirmaCuentaSuscriptor/" + $("#hashSuscriptor").val());
			}
		}
	}
</script>-->