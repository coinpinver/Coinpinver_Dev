<?php
$banderaInsert = $informacion["banderaInsert"];
$nombreContacto = $informacion["nombreContacto"];
$emailContacto = $informacion["emailContacto"];

?>
<style type="text/css">
	.img-contacto {
		background-image: url("../img/coinpinver/Contacto/ContactoUsuario.jpg");
	}
</style>

<div class="container-fluid mb-5 mt-5">
	<div class="row">
		<div class="col-xl-10 col-md-10 offset-xl-1 offset-md-1 col-12">
			<div class="card card-horizontal">
				<div class="card-img-top img-contacto"></div>
				<div class="card-body">
					<?php if($banderaInsert == 1) { ?>
						<div class="alert d-flex alert-success" role="alert">
							<i class="ai-check-circle fs-xl me-3"></i>
							<div><strong>¡ Éxito !</strong> Tu solicitud de contacto se guardo correctamente</div>
						</div>

						<h6>¡Hola <?=$nombreContacto?>!</h6>
						<p class="text-justify">Gracias por tu confianza, muy pronto nos pondremos en contacto contigo mediante el correo electrónico que nos proporcionaste <span class="text-primary"><?=$emailContacto?></span>.</p>
						<hr>
						<p class="text-justify">¿Aún no perteneces a nuestra comunidad?, ¿Que esperas?. Únete y vive ésta gran experiencia aprendiendo con nosotros.</p>
						<div class="text-center">
							<a href="<?=base_url()?>" class="btn btn-outline-dark btn-translucent-dark btn-sm btn-icon">
								<i class="ai-arrow-left"></i> Regresar
							</a>
							<a href="<?=base_url("index.php/Suscribete")?>" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon">
								<i class="ai-user-plus"></i> Suscríbete
							</a>
						</div>
					<?php } else { ?>
						<div class="alert d-flex alert-danger" role="alert">
							<i class="ai-x-circle fs-xl me-3"></i>
							<div><strong>¡ Error !</strong> Lo sentimos, algo salio mal</div>
						</div>
						<p class="text-justify">¡Ups! te pedimos una disculpa, algo salio mal en tu petición. Intentalo nuevamente.</p>
						<div class="text-center">
							<a href="<?=base_url()?>" class="btn btn-outline-dark btn-translucent-dark btn-sm btn-icon">
								<i class="ai-arrow-left"></i> Regresar
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>