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
					<?php if($banderaInsert == "REGISTRADO") {
						?>
						<div class="alert d-flex alert-success" role="alert">
							<i class="ai-check-circle fs-xl me-3"></i>
							<div><strong>¡ Bienvenido !</strong> </div>
						</div>

						<p class="text-justify">El <?=$campo?> <strong class="text-success"><?=$valorCampo?></strong> ha sido registrado correctamente.</p>
						<p class="text-justify">Ingresar <a href="<?=base_url("index.php/IniciarSesion")?>">aqui</a> </p>						

						<a href="<?=base_url("index.php/RegistroUsuario")?>" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
							<i class="ai-arrow-left"></i> Regresar
						</a>
					<?php  } ?>
					<?php if($banderaInsert == "EXISTECORREO" || $banderaInsert == "EXISTEUSUARIO") { ?>
						<div class="alert d-flex alert-warning" role="alert">
							<i class="ai-alert-triangle fs-xl me-3"></i>
							<div><strong>¡ Alerta !</strong> Ya eres parte de nosotros</div>
						</div>

						<p class="text-justify">El <?=$campo?> <strong class="text-warning"><?=$valorCampo?></strong> ya se encuentra registrado, favor de verificar por favor.</p>
						<p class="text-justify">En caso de que no recordar tu contraseña ingresa <a href="<?=base_url("index.php/RecuperarPass")?>">aqui</a> para recuperarla y seguir aprendiendo con nosotros</p>						

						<a href="<?=base_url("index.php/RegistroUsuario")?>" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
							<i class="ai-arrow-left"></i> Regresar
						</a>
					<?php  } if($banderaInsert == "PERFILACTUALIZADO") { ?>
						<div class="alert d-flex alert-success" role="alert">
							<i class="ai-check-circle fs-xl me-3"></i>
							<div><strong>¡ Excelente !</strong> </div>
						</div>

						<p class="text-justify">
							<?=$campo?> 
						</p>
						<p class="text-justify">Inicia <a href="<?=base_url("index.php/Inicio")?>">aqui</a> </p>						

						<a href="<?=base_url("index.php/PerfilUsuario")?>" class="btn btn-sm btn-primary btn-icon d-block w-100 mt-3">
							<i class="ai-arrow-left"></i> Regresar
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>