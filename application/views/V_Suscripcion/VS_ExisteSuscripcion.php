<?php

$campo = $informacion["campo"];
$valorCampo = $informacion["valorCampo"];
$banderaInsert = $informacion["banderaInsert"];

?>

<style type="text/css">
	.img-existe-suscripcion {
		background-image: url("../img/coinpinver/Suscripcion/existeSuscripcion.jpg");
	}
</style>
<div class="container-fluid mb-5 mt-5">
	<div class="row">
		<div class="col-xl-10 col-md-10 offset-xl-1 offset-md-1 col-12">
			<div class="card card-horizontal">
				<div class="card-img-top img-existe-suscripcion"></div>
				<div class="card-body">
					<?php if($banderaInsert == "NULL") { ?>
						<div class="alert d-flex alert-warning" role="alert">
							<i class="ai-alert-triangle fs-xl me-3"></i>
							<div><strong>¡ Alerta !</strong> Ya eres parte de nosotros</div>
						</div>

						<p class="text-justify">El <?=$campo?> <strong class="text-warning"><?=$valorCampo?></strong> ya existe registrado en coinpinver, favor de verificar tu suscripción.</p>
						<p class="text-justify">En caso de que no recordar tu contraseña ingresa <a href="#">aqui</a> para recuperarla y seguir aprendiendo con nosotros</p>						

						<a href="<?=base_url("index.php/Suscripcion")?>" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
							<i class="ai-arrow-left"></i> Regresar
						</a>
					<?php } else { ?>
						<div class="alert d-flex alert-danger" role="alert">
							<i class="ai-x-circle fs-xl me-3"></i>
							<div><strong>¡ Error !</strong> Lo sentimos, algo salio mal</div>
						</div>
						<p class="text-justify">¡Ups! te pedimos una disculpa, algo salio mal en tu suscripción. Intentalo nuevamente.</p>
						<div class="text-center">
							<a href="<?=base_url("index.php/Suscripcion")?>" class="btn btn-outline-dark btn-translucent-dark btn-sm btn-icon">
								<i class="ai-arrow-left"></i> Regresar
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>