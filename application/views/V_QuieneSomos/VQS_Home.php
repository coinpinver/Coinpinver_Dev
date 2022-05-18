<?php
$arrayDatos = $informacion["arrayDatos"];

$mision = $arrayDatos[0]->w_contenido;
$vision = $arrayDatos[1]->w_contenido;

?>
<section class="bg-secondary pt-5 pt-lg-6 estiloGeneral">
	<div class="container">
		<div class="row align-items-center border-bottom py-5">
			<div class="col-md-6 py-3"><img class="d-block mx-auto" src="<?=base_url("img/coinpinver/Educacion/Criptomonedas/mision.png")?>?t=<?=time()?>" alt="Misión"></div>
			<div class="col-xl-4 col-lg-5 col-md-6 offset-lg-1 py-3">
				<h3 class="h4 mb-4 textoQuienSomos">Misión</h3>
				<ul class="list-unstyled">
					<li class="d-flex mb-2 pb-1"><i class="ai-check-circle text-success fs-xl mt-1 me-3"></i>
						<span class=" textoQuienSomos">
							<?=$mision;?>
						</span>
					</li>
					
				</ul>
			</div>
		</div>
		<div class="row align-items-center border-bottom py-5">
			<div class="col-md-6 offset-lg-1 py-3 order-md-2"><img class="d-block mx-auto" src="<?=base_url("img/coinpinver/Educacion/Criptomonedas/vision.png")?>?t=<?=time()?>" alt="Misión"></div>
			<div class="col-xl-4 col-lg-5 col-md-6 offset-xl-1 py-3 order-md-1">
				<h3 class="h4 mb-4 textoQuienSomos">Visión</h3>
				<ul class="list-unstyled">
					<li class="d-flex mb-2 pb-1">
						<i class="ai-check-circle text-success fs-xl mt-1 me-3"></i>
						<span class="textoQuienSomos">
							<?=$vision;?>
						</span>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	
	
</section>

<section class="bg-secondary pt-5 pt-lg-6 estiloGeneral">
	<h2 class="mb-5 mt-3 mt-md-0 text-center textoQuienSomos">NUESTRO EQUIPO DE TRABAJO</h2>
	<div class="container mt-3 mb-5">
		<div class="row justify-content-center">
			<?php 	
				$arrayDatosQuieneSomos = $informacion["arrayDatosQuieneSomos"];
				foreach ($arrayDatosQuieneSomos as $key => $value) {
					$rutaImg = $value["rutaImg"];
					$nombre = $value["nombre"];
					$titulo = $value["titulo"];
					$rutaImg = base_url($rutaImg)."?t=<?=time()";
					$descripcion = $value["descripcion"];
					//$instagram = $value["instagram"];
					$redesSociales =$value["redesSociales"];
					
					$colaborado = '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 text-center mb-4">
							<div class="card border-0 shadow">
							<div class="card-img">
								<img width="50" src="'.$rutaImg.'" alt="'.$nombre.'" class="img-cpef">
							</div>
							<div class="card-img-overlay justify-content-end text-center">
								<h3 class="h6 text-light mb-1 textoEquipoTrabajo">'.$nombre.'</h3>
								<p class="fs-xs text-light mb-1 fw-bold textoEquipoTrabajo">'.$titulo.'</p>
								<p class="fs-xs text-light mb-1 text-justify textoEquipoTrabajo">'.$descripcion.'</p>
								<div class="d-flex justify-content-center align-items-center">
								';
								
						if(!empty($redesSociales["facebook"]))
						{

							$facebook = $redesSociales["facebook"];
							$colaborado.='
									<a class="text-light text-decoration-none p-1 mx-2" href="'.$facebook.'" target="_blank">
											<i class="ai-facebook"></i>
									</a>
								';
						}
						if(!empty($redesSociales["twitter"]))
						{

							$twitter = $redesSociales["twitter"];
							$colaborado.='
									<a class="text-light text-decoration-none p-1 mx-2" href="'.$twitter.'" target="_blank">
											<i class="ai-twitter"></i>
									</a>
								';
						}
						if(!empty($redesSociales["linkedin"]))
						{

							$linkedin = $redesSociales["linkedin"];
							$colaborado.='
									<a class="text-light text-decoration-none p-1 mx-2" href="'.$linkedin.'" target="_blank">
											<i class="ai-linkedin"></i>
									</a>
								';
						}
						if(!empty($redesSociales["instagram"]))
						{

							$instagram = $redesSociales["instagram"];
							$colaborado.='
									<a class="text-light text-decoration-none p-1 mx-2" href="'.$instagram.'" target="_blank">
											<i class="ai-instagram"></i>
									</a>
								
								';
						}
						
						$colaborado.='</div></div>
						</div>
					</div>';
					echo $colaborado;
				}
			?>


			
		</div>
	</div>
</div>