$(function() {


    $("a[id=descargarwp]").click(function() {
        var titulo = "Descargar WhitePaper";
        var controlador = "downloadWhitePaper";
        var formulario = "formWhitePaper";
        var tamano = "modal-md";
        FormModal(titulo, controlador, formulario, tamano);
    });
    /*$("a[id=agregarTemaAnt]").click(function() {
        var titulo = "Agregar tema a WhitePaper";
        var controlador = "addTemaWhitePaper";
        var formulario = "formWhitePaper";
        var tamano = "modal-xl";
        FormModal(titulo, controlador, formulario, tamano);
    });
    $("a[id=updateTemaAnt]").click(function() {

        var vwwp_id = $("#campo1").val();

        $("#campo1").val(vwwp_id);

        var titulo = "Modificar tema a WhitePaper";
        var controlador = "ModalupdateTemaWhitePaper";
        var formulario = "formUpdateWhitePaper";
        var tamano = "modal-xl";
        FormModal(titulo, controlador, formulario, tamano);

    });*/
    $("a[id=agregarTema]").click(function() {
        $("#divAgregAaW").show();
        $("#divActw").hide();
        IrApartado("divAgregAaW", 1000);
    });
    $("a[id=updateTema]").click(function() {

        $("#divAgregAaW").fadeOut("slow");
        $("#divActw").fadeIn(1000);
        var vwwp_id = $("#campo1").val();
        var controlador = "ModalupdateTemaWhitePaper";
        let respuesta = "resulActW";
        $("#campo1").val(vwwp_id);

        $.ajax({
            type: "POST",
            url: base_url + "index.php/" + controlador,
            data: { "vwwp_id": vwwp_id },
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
        IrApartado("divActw", 1000);
        /*
        var titulo = "Modificar tema a WhitePaper";
        var controlador = "ModalupdateTemaWhitePaper";
        var formulario = "formUpdateWhitePaper";
        var tamano = "modal-xl";
        FormModal(titulo, controlador, formulario, tamano);
		*/

    });


    $("button[id=saveTemaWP]").click(function() {

        var contenidoWhitePaper = CKEDITOR.instances['contenidoWhitepaper'].getData();
        var tituloWhitePaper = $("#tituloWhitePaper").val();
        var banderaSubmit = 0;
        if ($("#tituloWhitePaper").val().length <= 0) { banderaSubmit++; }
        if (contenidoWhitePaper.length <= 0) { banderaSubmit++; }
        if (banderaSubmit <= 0) {
            var controlador = "saveTemaWhitePaper";
            showEsperando("Espere un momento", "Cargando información.");
            $.ajax({
                type: "POST",
                url: base_url + "index.php/" + controlador,
                data: { "titulo": tituloWhitePaper, "contenidoWhitePaper": contenidoWhitePaper },
                success: function(resp) {
                    $('#respuestaWhite').attr('disabled', false).html(resp);
                },
                complete: function(XMLHttpRequest, textStatus) {
                    hideEsperando();
                    showNotification("!Correcto¡", "Se ha agregado correctamente", "success");
                    setTimeout(refreshWhitePaper, 3000);


                },
                error: function() {
                    showEsperando("Error", "Ocurrio un error, estamos trabajando para solventarlo");
                }
            });
        } else {
            showNotification("!Alerta¡", "Los campos marcados con <strong>(*)</strong> son obrigatorios. Favor de no dejarlos en blanco", "warning");
        }



    });
    $("button[id=updateTemaWP]").click(function() {
        var editorName = 'contenidoWhitepaper_up';
        var contenidoWhitePaper = CKEDITOR.instances[editorName].getData();
        var tituloWhitePaper = $("#tituloWhitePaper_up").val();
        var banderaSubmit = 0;
        if ($("#tituloWhitePaper_up").val().length <= 0) { banderaSubmit++; }
        if (contenidoWhitePaper.length <= 0) { banderaSubmit++; }
        if (banderaSubmit <= 0) {
            var controlador = "updateTemaWhitePaper";
            showEsperando("Espere un momento", "Cargando información.");
            var w_id = $("#w_id").val();
            $.ajax({
                type: "POST",
                url: base_url + "index.php/" + controlador,
                data: { "w_id": w_id, "titulo": tituloWhitePaper, "contenidoWhitePaper": contenidoWhitePaper },
                success: function(resp) {
                    $('#respuestaWhiteup').attr('disabled', false).html(resp);
                },
                complete: function(XMLHttpRequest, textStatus) {
                    hideEsperando();
                    showNotification("!Correcto¡", "Se ha actualizado correctamente", "success");
                    setTimeout(refreshWhitePaper, 3000);

                },
                error: function() {
                    showEsperando("Error", "Ocurrio un error, estamos trabajando para solventarlo");
                }
            });
        } else {
            showNotification("!Alerta¡", "Los campos marcados con <strong>(*)</strong> son obrigatorios. Favor de no dejarlos en blanco", "warning");
        }



    });
});

function refreshWhitePaper() {
    window.location.replace(base_url + "index.php/WhitePaper");

}

function IrApartado(elemento, tiempo) {
    $("html, body").animate({ scrollTop: $("#" + elemento).offset().top }, tiempo);
}