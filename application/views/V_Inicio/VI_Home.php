<style type="text/css">
.img-contacto {
    background-image: url("../img/coinpinver/Inicio/asesoria.jpeg");
}

section {}

.btn-coinpinver {
    background-color: #6d7c7a;
    color: white;
}

.btn-coinpinver:hover {
    color: white;
}

#img_cprpr {
    margin-left: -30px;
}

@media only screen and (max-width: 700px) {
    #img_cprpr {
        padding: 0;
        margin: 0;
        margin-left: -14px;
    }
}

.parallax-style>img {
    width: 40%;
}

#colorDorado {
    /*background-color: rgba(250, 242,144, 1.0);*/
}

#videoInicio {
    margin-top: 0px;
    
    background-color: #37384e;
    /*opacity: 0.8;*/
}

#videoInicio:before {
    background-color: #37384e;
}

#div1Seccion3 {
    position: relative;
    left: 70px;
}
#div1Seccion3Staking{
    position:relative;
}
#imgEarndiv1Seccion3{
    height: 90vh;
}
#imgEarndiv1SeccionCripto{
    height: 80vh;
}
#div2Seccion3 {
    position: relative;
    top: -4em;

}

.seccion1 {}
#imagenIngresaBlockchain{
    position: relative;
    margin-top: -23em;
    margin-left: 2em;
}
#letrasChiquitas{
    font-size:0.6em;
    top: 1em;
    position: relative;
}
#imgTestimonios{
    height:60vh;
    margin-left: 20%;
}
#vih_redesSociales{
    overflow:auto;
}
</style>

<form id="Inicio">


    <section class="overflow-hidden border-bottom estiloGeneral"
        style="background-image: url(<?=base_url("img/logo/logo_coinpinver.jpg")?>?t=<?=time()?>);">
        <div class="row">
            <video poster="<?=base_url("img/logo/logo_coinpinver.jpg")?>?t=<?=time()?>" id="videoInicio" autoplay loop
                muted playsinline>
                <source src="<?=base_url("Archivos/Video/introcoinpinver.mp4")?>?t=<?=time()?>" type="video/mp4">
                Su navegador no puede reproducir este formato de video
            </video>
        </div>
    </section>
    <section class="overflow-hidden border-bottom estiloGeneral sectionImgBlock"
        style="background-image: url(<?=base_url("img/coinpinver/Inicio/blockchain_cprp.jpg")?>?t=<?=time()?>);">
        <div class="row">
            <video poster="<?=base_url("img/logo/logo_coinpinver.jpg")?>?t=<?=time()?>" id="videoInicio" autoplay loop
                muted playsinline>
                <source src="<?=base_url("Archivos/Video/introcoinpinver_block.mp4")?>?t=<?=time()?>" type="video/mp4">
                Su navegador no puede reproducir este formato de video
            </video>
        </div>
        
        <div class="row justify-content-center" >
            <div class="col-6">
                <a href="http://explorer.coinpinver.network:8000/#/" style="color:white;"  target="_blank">
                    <img id="imagenIngresaBlockchain" class="imagenIngresaBlockchain" src="<?=base_url("img/coinpinver/Inicio/ingresa_b1.png")?>?t=<?=time()?>" alt="Coinpinver">    
                </a>
    
            </div>
        </div>
        
        
    </section>

    <!-- <section class="bg-secondary bg-size-cover overflow-hidden pt-3 pt-md-4 pt-lg-4 border-bottom estiloGeneral seccion2" style="background-image: url('https://around.createx.studio/img/demo/business-consulting/cta-bg.png')"> -->
    <section class="bg-secondary bg-size-cover overflow-hidden pt-3 pt-md-4 pt-lg-4 border-bottom estiloGeneral seccion2">
        <div class="row justify-content-center">
            <?php 
			$arrayTarjetas = $informacion["arrayTarjetas"];
			$i=0;
			foreach ($arrayTarjetas as $key => $value) {
				$rutaImg = $value["rutaImg"];
				$titulo = $value["titulo"];
				$descripcion = $value["descripcion"];
				$by = $value["by"];
				$rutaapp = $value["rutaapp"];
				$idelemento = $value["idelemento"];
                $baseurl = $value["baseurl"];
				echo  '
					<div class="col-12  col-md-4 col-lg-4 p-3">
						<div class="pb-2 tns-item tns-slide-active text-center" id="tns2-item0">
			              <article class="card card-hover h-100 border-0 shadow pt-4 pb-5 mx-1 divsecciones" id="vermas" value-elemento = "'.$idelemento.'" value-ruta = "'.$rutaapp.'">
			                <div class="card-body pt-5 px-4 px-xl-5 divsecciones">
								
								<h2 class="h2 nav-heading mb-4">
			                  		<a class="textodivseecion" href="#">'.$titulo.'</a>
			                  	</h2>
			                	
			                  	<h5 class="h5 nav-heading mb-4">
			                  		<a class="textodivseecion" href="#">'.$descripcion.'</a>
			                  	</h5>
			                </div>
			                <div class="px-4 px-xl-5 pt-2 divsecciones">
			                	<a class="d-flex meta-link fs-sm align-items-center" href="#">
			                		<img class="flex-shrink-0 rounded-circle tns-complete imgPlataformas'.$i.'" src="'.$baseurl.'" alt="Coinpinver" width="42">
			                    	<div class="ps-2 ms-1 mt-n1">
			                    		<span class="fw-semibold ms-1 cursor textodivseecion" >Más información</span>
			                    	</div>
			                    </a>

			                </div>
			              </article>
			            </div>
			        </div>
				';
				$i++;
			}
			?>

        </div>
        <div class="masonry-filterable">
            <div class="row justify-content-center">

                <?php 
			$arrayTarjetas = $informacion["arrayTarjetas"];
			$baseurl = base_url("img/logo/Coinpinver-Favicon.png");
			foreach ($arrayTarjetas as $key => $value) {
				$rutaImg = $value["rutaImg"];
				$titulo = $value["titulo"];
				$descripcion = $value["descripcion"];
				$by = $value["by"];
				$rutaapp = $value["rutaapp"];
				$idelemento = $value["idelemento"];
				$plataformas = '
					<div class="col-12 col-sm-12 col-md-4 col-lg-4 pt-3">
						<div class="masonry-grid-item" data-groups="["stationery", "branding"]">
							<div class="card card-flip">
								<div class="card-flip-inner">
									<div class="card-flip-front">
										<img class="card-img" src="'.$rutaImg.'" alt="'.$titulo.'"/>
									</div>
									<a class="card-flip-back" href="#">
										<div class="card-body">
											<div class="card-body-inner">
												<h3 class="h5 card-title mb-2">'.$titulo.'</h3>
												<p class="fs-sm text-muted">'.$descripcion.'</p>
												<br>
												<span class="btn btn-primary btn-sm" id="vermas" value-elemento = "'.$idelemento.'" value-ruta = "'.$rutaapp.'" >Ver más</span>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						
					</div>
				';
			}
			?>

            </div>
        </div>
        <br><br>
    </section>
    <!-- imagen 1.4 del documento -->
    <section class="pt-4 pt-md-4 pt-lg-4 overflow-hidden border-bottom estiloGeneral seccion3"
        style="background-image: url('https://around.createx.studio/img/demo/business-consulting/services/bg-shape.svg'); background-repeat:no-repeat;">
        <h2 class="h2 mb-4 text-center">Plataforma Earn</h2>
        <!-- <p class="text-center text-muted mb-0"><span class="text-warning">Coinpinver</span> tiene la mayor cantidad de transacciones para nuestros servicios EARN, STAKING Y TRADING.</p> -->
        <p class="text-center mb-0 textoCambia">Guarda tus criptomonedas como Coinpinver Phoenix, Bitcoin, Litecoin y generar staking con nuestra criptmoneda CPRP</p>
        <div class="row g-5" id="div1Seccion3">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
                <img class="d-block mx-auto" id="imgEarndiv1Seccion3" src="<?=base_url("img/coinpinver/Inicio/1.png")?>?t=<?=time()?>" alt="Earn">
            </div>
            
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3 ">
                
                <div class="ms-sm-4 py-5 my-sm-0 py-md-6 py-lg-7" id="div2Seccion3">

                    <h3 class="h4 mb-4">Beneficios 
                        <a href="http://cprp-app.flexcode.mx/login" target="_blank"> 
                            <span class="text-warning">EARN</span>
                        </a>
                    </h3>
                   
                    <ul class="list-unstyled">
                        <?php
                            $arrayBeneficiosEarn = $informacion["arrayBeneficiosEarn"];
                            foreach($arrayBeneficiosEarn as $a){
                                $icono = $a["icono"];
                                $colorTxt = $a["color-texto"];
                                $beneficio = $a["beneficio"];
                                echo '
                                    <li class="d-flex mb-2 pb-1">
                                        <i class="'.$icono.' '.$colorTxt.' fs-xl mt-1 me-3"></i>
                                        <span>'.$beneficio.'</span>
                                    </li>
                                ';
                            }
                            
                        ?>
                        
                    </ul>
                    <h4 class="h6 pt-2 mb-1">Tecnología blockchain</h4>
                    <p>Invierte y gana 
                        <a href="http://cprp-app.flexcode.mx/login" target="_blank"> 
                            <span class="text-warning">Coinpinver</span>
                        </a>
                    </p>
                    

                </div>

            </div>
        </div>
        <div class="row justify-content-center " id="div1Seccion3Staking">
            <h2 class="h2 mb-4 text-center">¿Qué es staking de criptomonedas?</h2>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="oscuro card card-body d-md-flex py-grid-gutter px-grid-gutter border-0 shadow-lg ">
                    <blockquote class="blockquote">
                    <p class="text-justify">Staking es similar al de un depósito a plazo fijo. 
                        El usuario "presta o mantiene bloquedas" una parte de sus criptomonedas a cambio de ganar unos intereses. 
                        Esos intereses se reciben en forma de criptomoneda.</p>
                    
                    <footer class="d-flex align-items-center cursor" id="staking">
                        <img class="rounded-circle" src="<?=base_url("img/coinpinver/Inicio/staking.png")?>?t=<?=time()?>" alt="Staking" width="42">
                        <div class="fs-md fw-medium ps-2 ms-1 textoCambia">Comienza hacer staking</div>
                    </footer>
                    
                    
                    </blockquote>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <h2 class="h2 mb-4 text-center">Simula tu ganancia</h2>
                <div class="oscuro card card-body d-md-flex py-grid-gutter px-grid-gutter border-0 shadow-lg ">
                    <form id="formSimulacion" name="formSimulacion" method="POST">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3 mb-lg-0">
                                <input class="form-control" type="number" id="inversionASimular" name="inversionASimular" placeholder="Ingresa inversión a simular" required="">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <button id="btnSimular" class="btn btn-success d-block w-100" type="button">Simular</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="row justify-content-center pt-2 pt-md-2 pt-lg-2 oculto" id="divResulSimulacion">
                    <div class="col-12">
                        <div class="oscuro card card-body d-md-flex py-grid-gutter px-grid-gutter border-0 shadow-lg ">
                            <div id="resulSimulacion"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </section>
    <section
        class="bg-faded-primary position-relative py-7 overflow-hidden py-2 py-md-3 py-lg-4 border-bottom estiloGeneral seccion4">
        <div class="shape shape-bottom shape-curve-side bg-body">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 250">
                <path fill="currentColor"
                    d="M3000,0v250H0v-51c572.7,34.3,1125.3,34.3,1657.8,0C2190.3,164.8,2637.7,98.4,3000,0z"></path>
            </svg>
        </div>
        <h2 class="h2 mb-4 text-center">CRIPTOMONEDAS</h2>
        <div class="row align-items-center border-bottom py-2">
            <div class="col-md-6 py-3 order-md-2">
                <img id="imgEarndiv1SeccionCripto" class="d-block mx-auto rounded" src="<?=base_url("img/coinpinver/Inicio/2.png")?>?=time()" alt="Criptomonedas">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 offset-xl-1 py-3 order-md-1">
                <!-- <h3 class="h4 mb-4">Web Development (Software)</h3> -->
                <ul class="list-unstyled">
                    <?php
                        $arraySeccionCripto = $informacion["arraySeccionCripto"];
                        foreach($arraySeccionCripto as $a){
                            $icono = $a["icono"];
                            $colorTxt = $a["color-texto"];
                            $beneficio = $a["beneficio"];
                            echo '
                                <li class="d-flex mb-2 pb-1">
                                    <i class="'.$icono.' '.$colorTxt.' fs-xl mt-1 me-3"></i>
                                    <span>'.$beneficio.'</span>
                                </li>
                            ';
                        }
                        
                    ?>
                </ul>
                <br>
                <a class="btn btn-warning quitarTextDark" href="http://cprp-app.flexcode.mx/login" target="_blank">Trading</a>
                <!-- <a class="btn btn-gradient quitarTextDark" href="<?=base_url("index.php/Quienes-somos")?>">Aprende de
                    Coinpinver</a> -->

            </div>
        </div>
    </section>
    <!-- imagen 1.3 del documento esta sección se estaría quitando -->
    <section class="bg-faded-secondary overflow-hidden pt-5 pt-md-6 pt-lg-5 border-bottom estiloGeneral seccion5 oculto"
        id="plataformaEarn">

        <!-- <h2 class="text-center mb-5">Plataforma EARN</h2> -->
        <div class="row align-items-center pt-3 pt-md-0">
            <div class="col-12 col-md-6 col-lg-6">
                <a class="btn position-relative quitarTextDark" href="http://cprp-app.flexcode.mx/login">
                    <img class="d-block mx-auto rounded" src="<?=base_url("img/coinpinver/Inicio/earn3.png");?>?=time()"
                        alt="EARN" width="705">
                </a>
            </div>
            <div class="col-12  col-md-6 col-xl-6 pt-5 pt-md-0">
                <h2 class="h2 mb-3 text-center text-md-start">Plataforma EARN</h2>
                <p class="text-center text-md-start">En esta plataforma podrás realizar la compra y venta de nuestra
                    criptomoneda <b>coinpinver phoenix CPRP</b>.
                    
                </p>
                <div class="mx-auto mx-0 pt-3" style="max-width: 600px;">
                    <div class="row align-items-center">
                        <?php 
						$arrayEarn = $informacion["arrayEarn"];
						foreach($arrayEarn as $datos)
						{
							$icono = $datos["icono"];
							$titulo = $datos["titulo"];
							$alt = $datos["alt"];
							$descripcion = $datos["descripcion"];
							$textlink = $datos["textlink"];
							$link = $datos["link"];


							echo '
								<div class="col-12 col-sm-12 col-md-6 col-lg-6">
									<div class="bg-light shadow-lg rounded-3 p-4 mb-grid-gutter text-center text-sm-start divsecciones">
										<img class="d-inline-block mb-4 mt-2 rounded-3" src="'.$icono.'" alt="'.$alt.'" width="50">
										
										<h3 class="h5 mb-2 textodivseecion">'.$titulo.'</h3>
										<p class="fs-sm textodivseecion"> '.$descripcion.' 
											<a class=" linktextoEarn" href="'.$link.'" target="_blank">
												'.$textlink.'
											</a>
										</p>
									</div>
								</div>
							';
						}
						?>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </section>

    <!-- imagen 1.6 del documento	 -->
    <section class="bg-faded-primary position-relative overflow-hidden py-2 py-md-1 py-lg-1 border-bottom estiloGeneral seccion6">
        <div class="shape shape-top shape-curve bg-body">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                <path fill="currentColor" d="M3000,185.4V0H0v185.4C496.4,69.8,996.4,12,1500,12S2503.6,69.8,3000,185.4z">
                </path>
            </svg>
        </div>
        <div class="container-fluid py-3 py-lg-4 overflow-hidden">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-5 d-flex justify-content-end mb-5 mb-lg-0">
                    <div class="mx-auto ms-lg-0 me-xl-7 text-center text-lg-start" style="max-width: 495px;">
                        <h2 class="h1 mb-4">Registrate en nuestra plataforma <span class="text-warning">EARN</span></h2>
                        <p class="mb-5">La forma más rápida y sencilla de ganar comisiones con coinpinver en dos sencillos pasos.</p>
                            <ul class="list-unstyled" >
                                <li class="d-flex mb-0 pb-1">
                                    <i class="ai-check-circle text-success fs-xl me-3"></i>
                                    <span id="earn" class="d-flex meta-link">Registraté 
                                        <a class="text-warning"  href="http://explorer.coinpinver.network:8000/#/" target="_blank">
                                        &nbsp;aquí 
                                        </a>
                                    </span>
                                </li>
                                <li class="d-flex mb-0 pb-1">
                                    <i class="ai-dollar-sign text-success fs-xl me-3"></i>
                                    <span class="d-flex meta-link">Comparte tu link de referidos y gana.</span>
                                </li>
                            </ul>
                        <br>
                        <p class="text-justify">
                            <span><b>Ejemplo:</b> Si compartes a 20 amigos y c/u  compra paquetes de monedas cprp de mínimo 100 usd 
                            <br>100 usd = 2% comisión 
                            <br>100 usd = 2 usd 
                            <br>20 amigos (holders) = 40 usd en comisiones en criptomonedas 
                            </span>
                            <br>
                            <span id="letrasChiquitas"><b>Las comisiones se pagarán con la moneda que el usuario page su paquete de CPRP</b></span>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 d-flex justify-content-end pe-0">
                    <a class="d-block me-n3" href="#">
                        <img id="img_cprpr" class="d-block rounded"
                            src="<?=base_url("img/coinpinver/Inicio/3.png")?>?t=<?=time()?>"
                            alt="Components">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- imagen 1.7 del documento de momento se quit	 -->
    <!-- Testimonios -->
    <section class=" py-3 py-md-4 py-lg-5 border-bottom estiloGeneral ">
        <h2 class="h2 mb-4 text-center">TESTIMONIOS</h2>
        <div class="container">
                    
            <div class="tns-carousel-wrapper row">

                <!-- Actual carousel -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tns-carousel-inner" data-carousel-options='{"nav": false, "gutter": 20}'>
                        <?php
                        $arrayTestimonios = $informacion["arrayTestimonios"];
                        foreach($arrayTestimonios as $test){
                            $texto = $test["texto"];
                            $imagen = $test["imagen"];
                            $nombre = $test["nombre"];
                            echo '
                            <blockquote class="blockquote mt-3 mb-0">
                                <p class="text-justify">'.$texto.'</p>
                                <br><br>
                                <footer class="d-flex align-items-center">
                                    <img src="'.$imagen.'" class="rounded-circle" width="42" alt="'.$nombre.'"/>
                                    
                                    <div class=" textoCambia fs-md fw-medium ps-2 ms-1">'.$nombre.'</div>
                                </footer>
                            </blockquote>
                            ';
                        }
                        ?>
                    </div>
                </div>

                <!-- Custom pager -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <img id="imgTestimonios" class="d-block rounded" src="<?=base_url("img/coinpinver/Inicio/5.png")?>?t=<?=time()?>" alt="Testimonios">
                </div>
            </div>
        </div>
    </section>
    <section class=" py-3 py-md-4 py-lg-5 border-bottom estiloGeneral seccion7" id="elearning">
        <div class="container py-3 py-lg-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="h1 mb-4">TODOS LOS BLOGS INFORMATIVOS DE <span
                            class="bg-faded-warning rounded text-warning px-3 py-2">CRIPTOMONEDAS</span></h2>
                    <p class=" mb-5">Siempre estarás informado sobre criptomonedas y más en nuestra red social
                        e-learning</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <a class="btn btn-warning position-relative" id="btn-learning">Pública tu blogs o
                            video curso</a>
                    </div>
                    <br><br><br><br><br><br>
                    <h2 class="h3 mb-4">PREGUNTAS FRECUENTES </h2>

                </div>
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="mx-auto mx-md-0" style="max-width: 525px;"><img class="d-block rounded"
                            src="<?=base_url("img/coinpinver/Inicio/6.png")?>?=time()" alt="E-LEARNING">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-faded-primary position-relative py-7 overflow-hidden py-2 py-md-1 py-lg-2 border-bottom estiloGeneral">

        <h2 class="h1 mb-4 pb-3 text-center">Nuestras redes sociales</h2>
        
        <div class="pb-4" data-simplebar="init" data-simplebar-auto-hide="false">
            <div class="simplebar-wrapper" style="margin: 0px 0px -24px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                            <div class="simplebar-content" style="padding: 0px 0px 24px;">
                                <div class="d-flex justify-content-between" id="vih_redesSociales">
                                    <a class="nav-link-style" href="https://t.me/+FI9Ps8v02ge0EwII" target="_blank" style="min-width: 120px;">
                                        <img class="d-block mx-auto mb-4" src="<?=base_url("img/coinpinver/Inicio/906377.png")?>?t=<?=time()?>" alt="Telegram" style="max-width: 80px;">
                                        <p class="mb-0 text-center">Telegram</p>
                                    </a>
                                    <a class="nav-link-style" href="https://discord.gg/gUG79zQn" target="_blank" style="min-width: 120px;">
                                        <img class="d-block mx-auto mb-4 rounded-circle" src="<?=base_url("img/coinpinver/Inicio/discord.jpg")?>?t=<?=time()?>" alt="Discored" style="max-width: 80px;">
                                        <p class="mb-0 text-center">Discored</p>
                                    </a>
                                    <a class="nav-link-style" href="https://twitter.com/ECoinpinver" target="_blank" style="min-width: 120px;">
                                        <img class="d-block mx-auto mb-4" src="<?=base_url("img/coinpinver/Inicio/3670151.png")?>?t=<?=time()?>" alt="Twitter" style="max-width: 80px;">
                                        <p class="mb-0 text-center">Twitter</p>
                                    </a>
                                    <a class="nav-link-style" href="http://cprp-app.flexcode.mx/login" target="_blank" style="min-width: 120px;">
                                        <img class="d-block mx-auto mb-4" src="<?=base_url("img/logo/Coinpinver-Favicon.png")?>?t=<?=time()?>" alt="CoinPinver Phoenix CPRP" style="max-width: 80px;">
                                        <p class="mb-0 text-center">CoinPinver Phoenix CPRP</p>
                                    </a>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 152px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar simplebar-visible" style="height: 0px; display: none;"></div>
            </div>
        </div>

    </section>
    <!-- Patrocinadores -->
    <section class="bg-faded-primary position-relative py-7 overflow-hidden py-2 py-md-1 py-lg-2 border-bottom estiloGeneral">
        <div class="shape shape-top shape-curve bg-body">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                <path fill="currentColor" d="M3000,185.4V0H0v185.4C496.4,69.8,996.4,12,1500,12S2503.6,69.8,3000,185.4z">
                </path>
            </svg>
        </div>
        <div class="container pt-2 pb-2 py-md-2 py-lg-2">
          <div class="text-center mb-5 pt-3 pt-lg-4">
            <h2 class="h1 mb-4">Patrocinadores</h2>
            <p class="text-muted">Empresas que confian en <span class="text-warning">CoinPinver</span> </p>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3">
                <a class="d-block nav-heading text-center" href="#">
                <div class="card card-hover border-0 shadow-lg mb-4">
                    <img class="card-img" src="<?=base_url("img/coinpinver/Patrocinadores/emp1.jpeg")?>?t=<?=time()?>" alt="Business Consulting">
                </div>
                <h3 class="h5 nav-heading-title mb-0">Easy Controls</h3>
                <!--<span class="fs-sm fw-normal text-muted">Breve descripción</span></a>-->
            </div>
            
          </div>
        </div>
    </section>

</form>
<script>
$(function() {
    //inversionASimular

    $("button[id=btnSimular]").click(function(){
        
        let inver = $("#inversionASimular").val();
        let formulario="formSimulacion";
        let controlador="Simulacion";
        let elemento_respuesta="resulSimulacion";
        console.log("entro"+inver);
        $.ajax({
            type: "POST",
            url: base_url + "index.php/" + controlador,
            data: {"inver":inver},
            success: function(resp) {
                $('#' + elemento_respuesta).attr('disabled', false).html(resp);
            },
            complete: function(XMLHttpRequest, textStatus) {
                hideEsperando();
                $("#divResulSimulacion").show(1000);
            },
            error: function() {
                showEsperando("Error", "Ocurrio un error, estamos trabajando para solventarlo");

            }
        });
        
    });
    var tiempo = 10000;
    // intervalo
    var interval = setInterval(function() {
        $(".ai-arrow-right").trigger('click');
    }, tiempo);
    $(".ai-arrow-right").click(function(){
        console.log("clic a siguiente");
    });
    $("footer[id=staking]").click(function() {
        var url = "http://cprp-app.flexcode.mx/login";
        window.open(url, '_blank');
        return false;
    });
    $("span[id=earn]").click(function() {
        var url = "http://cprp-app.flexcode.mx/login";
        window.open(url, '_blank');
        return false;
    });
    $("article[id=vermas]").click(function() {
        let elemento = $(this).attr("value-elemento");
        let ruta = $(this).attr("value-ruta");
        if (elemento === "whitepaper") {
            $(location).attr('href', ruta);
        } else {
            IrApartado(elemento, 2000);
        }

    });
    //deteccion();
    $("#btn-Instrucciones-recompensas").click(function() {
        showInstruccionesRecompensas();
    });
    $("#btn-white-paper").click(function() {
        showWhitepaper();
    });
    $("a[id=elearning]").click(function() {
        var url = "https://www.coinpinver.com/e-learning";
        window.open(url, '_blank');
        return false;
    });
    $("a[id=btn-learning]").click(function() {
        var url = "https://www.coinpinver.com/e-learning";
        window.open(url, '_blank');
        return false;
    });
    

});



function showInstruccionesRecompensas() {
    var titulo = "Instrucciones de recompensas";
    var controlador = "Recompensas";
    var formulario = "Inicio";
    var tamano = "modal-xl";
    FormModal(titulo, controlador, formulario, tamano);

}

function showWhitepaper() {
    var titulo = "White Paper";
    var controlador = "WhitePaper";
    var formulario = "Inicio";
    var tamano = "modal-xl";
    FormModal(titulo, controlador, formulario, tamano);

}

function autoRefreshPage() {
    window.location = window.location.href;
}
</script>