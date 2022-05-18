<head>
	<title>Coinpinver</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!--<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">-->
	
	<link rel="icon" type="image/png" href="<?=base_url("img/logo/Coinpinver-Favicon.png")?>?t=<?=time()?>"/>
	

	<script type="text/javascript">var base_url="<?=base_url()?>"</script>
	<link rel="stylesheet" media="screen" href="<?=base_url("vendor/simplebar/dist/simplebar.min.css")?>?t=<?=time()?>"/>
	<link rel="stylesheet" media="screen" href="<?=base_url("vendor/tiny-slider/dist/tiny-slider.css")?>?t=<?=time()?>"/>
	<link rel="stylesheet" media="screen" href="<?=base_url("vendor/lightgallery.js/dist/css/lightgallery.min.css")?>?t=<?=time()?>"/>
	<link rel="stylesheet" media="screen" href="<?=base_url("vendor/jquery.gritter/css/jquery.gritter.css")?>?t=<?=time()?>"/>
	<link rel="stylesheet" media="screen" href="<?=base_url("vendor/flatpickr/dist/flatpickr.min.css")?>?t=<?=time()?>"/>
	<link rel="stylesheet" media="screen" href="<?=base_url("vendor/chart/chartist.min.css")?>?t=<?=time()?>"/>
	<link rel="stylesheet" media="screen" href="<?=base_url("css/theme.min.css")?>?t=<?=time()?>">
	<link rel="stylesheet" media="screen" href="<?=base_url("css/particles/style.css")?>?t=<?=time()?>">
	<link rel="stylesheet" media="screen" href="<?=base_url("css/coinpinver.css")?>?t=<?=time()?>">
	<link rel="stylesheet" media="screen" href="<?=base_url("css/CSS_Home/CSSH_Inicio.css")?>?t=<?=time()?>">
	
	<script src="<?=base_url("js/jquery-3.3.1.min.js")?>?t=<?=time()?>"></script>
	<script src="<?=base_url("vendor/jquery.gritter/js/jquery.gritter.js")?>?t=<?=time()?>"></script>
	<script src="<?=base_url("js/coinpinver.js")?>?t=<?=time()?>"></script>
	
	

	<script src="https://translate.google.com/translate_a/element.js?cb=googleTraslateElementInit"></script>
	<style type="text/css">
		body
		{
			top: 0 !important;
		}
		.goog-te-banner-frame{
			display: none;
		}

		.goog-logo-link
		{
			display: none;	
		}
		.skiptranslate
		{
			color: transparent;
		}
		#particles-js
		{
			height: 100vh; 
			width: 100%;
		    position: fixed;
		    /*z-index: -1;*/
		}
	</style>
	<script>
		// let idiomas = 'ca,eu,gl,en,fr,it,pt,de';
		function googleTraslateElementInit(){
			 new google.translate.TranslateElement({
			// 	pageLanguage:'es'
			
				pageLanguage: 'es'


			}, 'google_translate_element');
		}
		// function googleTraslateElementInit(){
		// 	new google.translate.TranslateElement({
		// 		pageLanguage:'es'

		// 	}, 'google_translate_element2');
		// }
		var bandera;
		$(function()
		{
			
			$("a[id=addwallet]").click(function()
			{
				if(bandera == 1)
				{
					const base64image = 'https://www.coinpinver.com.mx/Coinpinver/img/logo/Coinpinver-Favicon.png';
					ethereum.request({
					  method: 'wallet_watchAsset',
					  params: {
					    type: 'ERC20',
					    options: {
					      address: '0xcde5A257C56a399acAc00D27AE009d8EA8ED366c',
					      symbol: 'CPRP',
					      decimals: 18,
					      image: base64image,
					    },
					  },
					});	
				}
				
			});

			if (window.ethereum) 
			{
			  handleEthereum();
			} 
			else 
			{
			  window.addEventListener('ethereum#initialized', handleEthereum, 
			  {
			    once: true,
			  });
			  // If the event is not dispatched by the end of the timeout,
			  // the user probably doesn't have MetaMask installed.
			  setTimeout(handleEthereum, 1000); // 3 seconds
			}
			
			
		});
		/*
		https://www.google.com/search?q=handleethereum+mobil&rlz=1C1UUXU_esMX930MX930&oq=handleEthereum&aqs=chrome.1.69i57j35i39j0i13i30j0i8i13i30l2.1778j0j7&sourceid=chrome&ie=UTF-8
		https://docs.metamask.io/guide/mobile-best-practices.html#deeplinking
		https://docs.walletconnect.com/mobile-linking
		https://ethereum.stackexchange.com/questions/117220/metamask-provider-not-detected-on-mobile/121200#121200
		*/

		function handleEthereum() {

		  const { ethereum } = window;
		  let title, text, color;
		  if (ethereum && ethereum.isMetaMask) {
		    console.log('Ethereum successfully detected!');
		    title ="Correcto";
		    text = "Tienes instalado metamasmk";
		    color = "success";
			$("#tituloMenuMetamask").text("Agregar Token MetaMask");
			bandera = 1; //instalado
		    // Access the decentralized web!
		  } else {
		  	title ="Alerta";
		    text = "Instalar metamask";
		    color = "warning";
		    console.log('Please install MetaMask!');
		    $("#tituloMenuMetamask").text("Instalar MetaMask");
		    $("#addwallet").attr("target","_blank");
		    $("#addwallet").attr("href","https://metamask.io/");
		    bandera = 2; //instalado
		  }
		  
		}
		function connect() {
		  ethereum
		    .request({ method: 'eth_requestAccounts' })
		    .then(handleAccountsChanged)
		    .catch((error) => {

		      if (error.code === 4001) {
		        // EIP-1193 userRejectedRequest error
		        console.log('Please connect to MetaMaskssss.');
		      } else {
		        console.error(error);
		        
		      }
		    });
		}
		function activarPublicidad(){
			
			var titulo = "Participa en nuestro gran sorteo";
			var controlador = "Rifa";
			var formulario = "formWhitePaper";
			var tamano = "modal-xl";
			FormModal(titulo, controlador, formulario, tamano);
			
			
		}
	</script>
	
</head>

<body class="bg-light">
	<!--<div class="page-loading active">-->
	<!--	<div class="page-loading-inner">-->
	<!--		<div class="page-spinner"></div><span>Cargando...</span>-->
	<!--	</div>-->
	<!--</div>-->

	
	<header class="header navbar navbar-expand-lg navbar-light bg-light navbar-shadow navbar-sticky" data-scroll-header="" data-fixed-element="">
		<div class="container px-0 px-xl-3">
			<button class="navbar-toggler ms-n2 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-4" href="<?=base_url()?>">
				<img class="d-none d-lg-block" id="iconoCoinpinver" src="<?=base_url("img/logo/CoinpinverHorizontal.png")?>" alt="LogoCoinpinver" width="145">
				<img class="d-lg-none" src="<?=base_url("img/logo/Coinpinver-Favicon.png")?>" alt="Coinpinver-Favicon" width="58">
			</a>

			<div class="d-flex align-items-center order-lg-3 ms-lg-auto">
				<div class="navbar-tool d-none d-sm-flex" id="ocultaRespo">
					<a class="navbar-tool-icon-box me-2" id="Idioma" href="#">
						<i class="ai-globe"></i>
					</a>
					<div class="oculto idioma1"></div>  
				</div>
				<div class="border-start me-2 d-none d-sm-flex" id="ocultaRespo" style="height: 30px;"></div>
				<div class="navbar-tool d-none d-sm-flex" id="ocultaRespo">
					<a class="navbar-tool-icon-box me-2" id="ModoOscuro" href="#">
						<i class="ai-sun"></i>
					</a>
				</div>
				<div class="border-start me-2 d-none d-sm-flex" id="ocultaRespo" style="height: 30px;"></div>

				
				<?php if(!isset($_SESSION["ACCESO-COINPINVER"])){ ?>
					<div class="navbar-tool " id="divIconoSesion">
						<a class="nav-link-style fs-xs text-nowrap" href="<?=base_url("index.php/IniciarSesion")?>">
							<i class="ai-user fs-xl me-2"></i><span id="iniciSesion">Iniciar sesión</span>
						</a>
					</div>
					
				<?php } else { ?>
					<div class="navbar-tool dropdown">
						<a class="navbar-tool-icon-box" href="account-profile.html">
							<img class="navbar-tool-icon-box-img img-avatar-user" src="<?=$_SESSION['rutaFotografiaUsuario']?>" alt="Avatar">
						</a>
						<a class="navbar-tool-label dropdown-toggle" href="#"><small>Hola,</small><?=$_SESSION['aliasUsuario']?></a>
						<ul class="dropdown-menu dropdown-menu-end estiloGeneralSubmenu" style="width: 15rem;">
							<li>
								<a class="dropdown-item d-flex align-items-center" href="<?=base_url("index.php/PerfilUsuario")?>">
									<i class="ai-settings fs-base opacity-60 me-2"></i>Perfil
								</a>
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center" href="<?=base_url("index.php/CerrarSesion")?>">
									<i class="ai-log-out fs-base opacity-60 me-2"></i>Salir
								</a>
							</li>
						</ul>
					</div>
				<?php } ?>
			</div>

			<div class="offcanvas offcanvas-collapse order-lg-2" id="primaryMenu">
				<div class="offcanvas-cap navbar-shadow">
					<h5 class="mt-1 mb-0 menuDispositivo">Menú</h5>
					
					<a class="navbar-brand flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-4" href="<?=base_url()?>">
						<img class="d-lg-block" id="iconoCoinpinverDispositivo" src="<?=base_url("img/logo/CoinpinverHorizontal.png")?>" alt="LogoCoinpinver" width="145">
					</a>
					<button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle menuDispositivo" href="#" data-bs-toggle="dropdown">
								<i class="ai-disc me-2 menuDispositivo"></i>Cprp
							</a>
							<ul class="dropdown-menu estiloGeneralSubmenu">
								<li>
									<a class="dropdown-item menuDispositivo" href="http://cprp-app.flexcode.mx/login" target="_blank">
										<i class="ai-dollar-sign me-2 menuDispositivo"></i>
										Sell Cprp
									</a>
								</li>
								<li>
									<a class="dropdown-item menuDispositivo" href="http://explorer.coinpinver.network:8000/#/" target="_blank">
										<i class="ai-box me-2 menuDispositivo"></i>
										Blockchain
									</a>
								</li>
								<!--<li>
									<a class="dropdown-item menuDispositivo" id="addwallet" href="#">
										<i class="ai-plus-square me-2 menuDispositivo"></i>
										<span id="tituloMenuMetamask"></span>
									</a>
								</li>-->
								
							</ul>
						</li>
						<!--<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle menuDispositivo" href="http://explorer.coinpinver.network:8000/#/" target="_blank"><i class="ai-trending-up me-2 menuDispositivo"></i> Blockchain</a>
							
						</li>-->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle menuDispositivo" href="http://cprp-app.flexcode.mx/login" target="_blank"><i class="ai-trending-up me-2 menuDispositivo"></i> Earn</a>
							
						</li>
						<!--<li class="nav-item"><a class="nav-link menuDispositivo" href="https://www.coinpinver.com.mx/e-learning" target="_blank"><i class="ai-tablet  me-2 menuDispositivo"></i> E-learning</a></li>-->
						<li class="nav-item"><a class="nav-link menuDispositivo" href="http://localhost:8888/e-learning" target="_blank"><i class="ai-tablet  me-2 menuDispositivo"></i> E-learning</a></li>

						<li class="nav-item"><a class="nav-link menuDispositivo" href="<?=base_url("index.php/Quienes-somos")?>"><i class="ai-users me-2 menuDispositivo"></i> Quienes Somos</a></li>

						<li class="nav-item"><a class="nav-link menuDispositivo" href="<?=base_url("index.php/Educacion")?>"><i class="ai-book me-2 menuDispositivo"></i> Educación</a></li>
						<li class="nav-item"><a class="nav-link menuDispositivo oculto IdiomaDisp" href="#"><i class="ai-globe me-2 menuDispositivo"></i> Cambiar de idioma</a></li>
						<li class="nav-item"><a class="nav-link menuDispositivo oculto ModoOscuro" id="ModoOscuro" href="#"><i class="ai-sun me-2 menuDispositivo"></i>
							<span class="textoTema menuDispositivo">Obscuro</span></a>
						</li>
						<li></li>
					</ul>

					<div class="idioma2 oculto"></div>  
				</div>

				
			</div>


		</div>
	</header>


<div>
<div id="particles-js"></div>