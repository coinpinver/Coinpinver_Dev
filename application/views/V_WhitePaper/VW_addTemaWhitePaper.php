
<div class="mb-3">
  <label for="tituloWhitePaper" class="form-label">Titulo de WhitePaper *</label>
  <input class="form-control form-control-sm" type="text" id="tituloWhitePaper" required="true">
</div>
<div class="mb-3">
  <label for="contenidoWhitepaper" class="form-label">Contenido *</label>
  <textarea class="form-control ckeditor" id="contenidoWhitepaper" rows="5" required="true"></textarea>
</div>
<button type="button" id="saveTemaWP" class="btn btn-outline-primary">Agregar</button>
<div id="respuestaWhite"></div>

<script src="<?=base_url("js/JS_WhitePaper/JSW_WhitePaper.js")?>?t=<?=time()?>"></script>