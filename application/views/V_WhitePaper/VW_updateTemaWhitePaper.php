<?php 
$getDescripcion = $informacion["getDescripcion"];
$w_id = $getDescripcion[0]->w_id;
$tituloWhitePaper_up = $getDescripcion[0]->w_titulo;
$contenidoWhitepaper = $getDescripcion[0]->w_contenido;

?>
<h2 class="h2 mb-4 text-center">Actualizar tema de Whitepaper</h2>
<div class="mb-3">
  <label for="tituloWhitePaper" class="form-label">Titulo de WhitePaper *</label>
  <input class="form-control form-control-sm" type="text" value="<?=$tituloWhitePaper_up;?>" id="tituloWhitePaper_up" required="true">
</div>
<div class="mb-3">
  <label for="contenidoWhitepaper_up" class="form-label">Contenido *</label>
  <textarea class="form-control" id="contenidoWhitepaper_up" name="contenidoWhitepaper_up" rows="5" required="true">
  	<?=$contenidoWhitepaper;?>
  </textarea>
</div>
<div class="row justify-content-end">
	<div class="col-4">
		<button type="button" id="updateTemaWP" class="btn btn-outline-primary">
			<i class="ai-check-circle text-success fs-xl mt-1 me-3"></i>	
			Actualizar
		</button>
	
	</div>
</div>


<input type="hidden" value="<?=$w_id;?>" id="w_id">
<div id="respuestaWhiteup"></div>

<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<script src="<?=base_url("js/JS_WhitePaper/JSW_WhitePaper.js")?>?t=<?=time()?>"></script>

<script>
	$(function()
	{
		// CKEDITOR.replace( 'contenidoWhitepaper_up' );

		var editorName = 'contenidoWhitepaper_up';
		var editor = CKEDITOR.instances[editorName];
		if (editor) 
		{ 
			editor.destroy(true); 
		}
		CKEDITOR.replace(editorName);
	});
</script>