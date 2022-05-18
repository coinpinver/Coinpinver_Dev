<div class="row">
	<div class="col-12 col-sm-12 col-md-6 col-lg-6">
		<div class="card card-flip">
			<div class="card-flip-inner">
				<div class="card-flip-front">
					<img class="card-img" src="<?=base_url("img/coinpinver/WhitePaper/whitepaperes.jpeg")?>?=time()" alt="WhitePaper español"/>
				</div>
				<a class="card-flip-back" href="<?=base_url("Archivos/whitepaper/whitepaperes.pdf");?>"  download="Whitepaper en Español" id="spanDescarga">
					<div class="card-body">
						<div class="card-body-inner">
							<h3 class="h5 card-title mb-2">WhitePaper</h3>
							<p class="fs-sm text-muted">Versión español</p>
							<span class="btn btn-primary btn-sm" value-wp="es" value-idioma = "Español" >Descargar</span>
							
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-md-6 col-lg-6">
		<div class="card card-flip">
			<div class="card-flip-inner">
				<div class="card-flip-front">
					<img class="card-img" src="<?=base_url("img/coinpinver/WhitePaper/whitepaperen.jpeg")?>?=time()" alt="WhitePaper Inglés"/>
				</div>
				<a class="card-flip-back" href="<?=base_url("Archivos/whitepaper/whitepaperen.pdf");?>"  download="Whitepaper en Inglés" id="spanDescarga">
					<div class="card-body">
						<div class="card-body-inner">
							<h3 class="h5 card-title mb-2">WhitePaper</h3>
							<p class="fs-sm text-muted">Versión inglés</p>
							<span class="btn btn-primary btn-sm" value-wp="en" value-idioma = "Inglés" >Download</span>
							
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>	
<!-- <a class="descargawhiteEs" href="<?=base_url("Archivos/whitepaper/whitepaperes.pdf");?>" target="_blank" download="Whitepaper en Español">whitepaper español</a>
<a class="descargawhiteEn" href="<?=base_url("Archivos/whitepaper/whitepaperen.pdf");?>" target="_blank" download="Whitepaper en Inglés">whitepaper Ingles</a> -->

<script>
	$(function()
	{
		
		$("a[id=spanDescarga]").click(function(){
			showNotification("¡Descargando!", "Espere un momento, se esta descargando whitepaper", "success");
		});
		// $("span[id=spanDescargaEn]").click(function(){
		// 	showNotification("!Descargando", "Espere un momento, se esta descargando whitepaper", "success");
		// });
		// $("span[id=spanDescarga]").click(function()
		// {
		// 	showNotification("!Descargando", "Espere un momento, se esta descargando whitepaper", "success");
		// 	var ban = $(this).attr("value-wp");
			
		// 	var idioma = $(this).attr("value-idioma");
		// 	var a = document.createElement('a');
		// 	var file_name = "";
		// 	file_name = "Whitepaper Versión "+idioma;
		// 	var ruta = base_url+"Archivos/whitepaper/whitepaper"+ban+".pdf";
			
		// 	a.href = ruta; 
			
		// 	a.download = file_name;
		// 	a.click();
		// });
	});
</script>
