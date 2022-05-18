<div class="sidebar-enabled">
    <div class="container-fluid position-relative">
        <form id="formWhitePaper">

            <div class="row border">

                <div class="sidebar col-lg-3 pt-lg-5">
                    <?php 
                      $titulosWhitePaper = $informacion["titulosWhitePaper"];
                      $w_id = "";
                      foreach ($titulosWhitePaper as $tit) {
                        $w_id = $tit->w_id;
                        $titulo = $tit->w_titulo;
                        echo '<h3 class="h5 cursor" id="vwwp_titulo" value-id ="'.$w_id.'"">'.$titulo.'</h3>';
                      }
                      ?>
                </div>
                <div class="col-lg-9 content py-4 mb-2 mb-sm-0 pb-sm-5">

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-start">

                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-end">
                            <a class="btn-social bs-outline bs-facebook me-2 my-2" title="Descargar" id="descargarwp"
                                href="#">
                                <i class="ai-download"></i>
                            </a>


                            <?php if(isset($_SESSION["Admin"]))
                              { 
                                ?>
                                    <a class="btn-social bs-outline bs-facebook me-2 my-2" title="Agregar" id="agregarTema"
                                        href="#">
                                        <i class="ai-plus"></i>
                                    </a>
                                    <a class="btn-social bs-outline bs-facebook me-2 my-2" title="Actualizar" id="updateTema"
                                        href="#">
                                        <i class="ai-refresh-ccw"></i>
                                    </a>
                                    <?php 

                              }
                              ?>
                        </div>
                    </div>

                    <div id="vwwp_descripcion" class="textoWhitePaper">
                        <?php 
              $titulo = $informacion["titulo"];
              echo '<h3 class="h5" id="vwwp_tituloact">'.$titulo."</h3>";
              echo "<br>";
              $descripcion = $informacion["descripcion"];
              echo $descripcion;
            ?>
                    </div>


                </div>
            </div>
            <input type="hidden" id="vwwp_id" name="vwwp_id">
        </form>
    </div>
</div>
<form id="formUpdateWhitePaper">
    <?php 
      $w_id = $informacion["w_id"];
    ?>
    <input type="hidden" value="<?=$w_id;?>" id="campo1" name="campo1">
</form>

<section class="bg-faded-primary position-relative py-7 overflow-hidden py-2 py-md-3 py-lg-4 border-bottom estiloGeneral seccion4">
      <div class="oculto" id="divAgregAaW">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <h2 class="h2 mb-4 text-center">Agregar tema al Whitepaper</h2>
                <div class="mb-3">
                    <label for="tituloWhitePaper" class="form-label">Titulo de WhitePaper *</label>
                    <input class="form-control form-control-sm" type="text" id="tituloWhitePaper" required="true">
                </div>
                <div class="mb-3">
                    <label for="addcontenidoWhitepaper" class="form-label">Contenido *</label>
                    <textarea class="form-control ckeditor" id="contenidoWhitepaper" rows="5" required="true"></textarea>
                </div>
            </div>
            
        </div>
        <div class="row justify-content-end">
          <div class="col-4">
            <button type="button" id="saveTemaWP" class="btn btn-outline-primary">
              <i class="ai-check-circle text-success fs-xl mt-1 me-3"></i>
              Guardar
            </button>
          </div>
        </div>

      </div>
      <div class="oculto" id="divActw">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
              <div id="resulActW"></div>
            </div>
        </div>
      </div>
</section>

<script src="<?=base_url("js/JS_WhitePaper/JSW_WhitePaper.js")?>?t=<?=time()?>"></script>
<script>
window.onload = function() {
    CKEDITOR.replace('addcontenidoWhitepaper');
}
$(function() {

    $("h3[id=vwwp_titulo]").click(function() {
        $("#divAgregAaW").hide();
        $("#divActw").hide();
        $("#vwwp_id").val();
        var id = $(this).attr("value-id");
        $("#vwwp_id").val(id);
        $("#campo1").val(id);

        var formulario = "formWhitePaper";
        var controlador = "WhitePaperDescripcion";
        var respuesta = "vwwp_descripcion";
        getDescripcion(formulario, controlador, respuesta);
        $("html, body").animate({
            scrollTop: $("#vwwp_descripcion").offset().top
        }, 1000);
        $("#vwwp_descripcion h3").addClass("textoWhitePaper");
        $("#vwwp_descripcion p").addClass("textoWhitePaper");
    });



});

function getDescripcion(formulario, controlador, respuesta) {
    $.ajax({
        type: "POST",
        url: base_url + "index.php/" + controlador,
        data: $("#" + formulario).serialize(),
        success: function(resp) {
            $('#' + respuesta).attr('disabled', false).html(resp);
        },
        complete: function(XMLHttpRequest, textStatus) {
            hideEsperando();
        },
        error: function() {
            showEsperando("Error", "Ocurrio un error, estamos trabajando para solventarlo");

        }
    });

}
</script>