$(function() {
    var dis = detectarDispositivo();
    if (dis === 1) {

        $("#divIconoSesion a").removeClass("nav-link-style fs-xs text-nowrap");
        $("#divIconoSesion a").addClass("navbar-tool-icon-box me-2");
        $("#iniciSesion").hide();
        $(".IdiomaDisp").show();
        $(".ModoOscuro").show();
        $(".idioma2").attr("id", "google_translate_element");
        $(".idioma2").css({ "position": "relative", "top": "0px", "left": "0px" });
        $("#videoInicio").css({ "margin-top": "0" });
        $("#div1Seccion3").css({ "position": "relative", "left": "0px" });
        $("#div2Seccion3").css({ "position": "relative", "left": "20px" });

    } else {

        $("#divIconoSesion a").addClass("nav-link-style fs-xs text-nowrap");
        $("#divIconoSesion a").removeClass("navbar-tool-icon-box me-2");
        $("#iniciSesion").show();
        $(".idioma1").attr("id", "google_translate_element");

    }
    if (localStorage.getItem('blanco')) {
        blanco();

    }
    if (localStorage.getItem('negro')) {
        negro();

    }

    $("a[id=ModoOscuro]").click(function() {

        if ($("body").hasClass("bg-light") === true || $("header").hasClass("navbar-light") === true || $("header").hasClass("bg-light") === true) {
            negro();
            var light = "negro";
            localStorage.setItem("negro", light);
            localStorage.removeItem('blanco');

            return;
        }

        if ($("body").hasClass("bg-dark") === true || $("header").hasClass("navbar-dark") === true || $("header").hasClass("bg-dark") === true) {
            blanco();
            var dark = "blanco";
            localStorage.setItem("blanco", dark);
            localStorage.removeItem('negro');
            return;
        }


    });


    $("a[id=Idioma]").click(function() {
        $("#google_translate_element").toggle();
    });
    $(".IdiomaDisp").click(function() {
        $("#google_translate_element").toggle();
    });

});

function blanco() {

    $("#ModoOscuro i").removeClass("ai-sun");
    $("#ModoOscuro i").addClass("ai-moon");
    $("#ModoOscuro i").fadeIn(2000);
    $("body").removeClass("bg-dark");
    $("header").removeClass("navbar-dark");
    $("header").removeClass("bg-dark");

    $("body").addClass("bg-light");
    $("header").addClass("navbar-light");
    $("header").addClass("bg-light");
    $(".textoTema").text("Obscuro");
    $(".estiloGeneralSubmenu").removeClass("bg-dark");
    $("h1,h2,h3,h4,h5,h6, span, p, i, a").removeClass("text-light");
    //$("h1,h2,h3,h4,h5,h6, span, p, i, a").addClass("text-dark");
    let urlimg = base_url + "img/logo/CoinpinverHorizontal.png";
    $("img[id=iconoCoinpinver]").attr("src", urlimg);
    $("img[id=iconoCoinpinverDispositivo]").attr("src", urlimg);

    $(".seccion2").addClass("bg-secondary");
    let imageUrl = "https://around.createx.studio/img/demo/business-consulting/services/bg-shape.svg";
    $(".seccion3").css({ "background-image": "url(" + imageUrl + ")", "background-repeat": "no-repeat" });
    $(".seccion4").addClass("bg-faded-primary");
    $(".seccion5").addClass("bg-faded-secondary");
    $(".seccion6").addClass("bg-faded-primary");
    $(".seccion7").removeClass("bg-faded-primary");
    $(".textoPie").addClass("text-light");
    $(".menuDispositivo").removeClass("text-dark");
    $("#primaryMenu").removeClass("bg-dark");
    $(".textoEarn").removeClass("text-dark");
    $(".linktextoEarn").removeClass("text-primary");
    $(".divsecciones").removeClass("bg-dark");
    $(".textodivseecion").removeClass("text-light");
    $(".textoQuienSomos").removeClass("text-dark");
    $(".textoEquipoTrabajo").addClass("text-light");
    $(".textoMenuPerfil").removeClass("text-dark");
    $(".textoEducacion").removeClass("text-dark");
    $(".textoWhitePaper").removeClass("text-light");
    $(".textoWhitePaper h3").removeClass("text-light");
    $(".textoWhitePaper p").removeClass("text-light");
    $(".oscuro").removeClass("bg-dark");
    $(".textoCambia").removeClass("text-light");
    

}

function negro() {

    $("#ModoOscuro i").addClass("ai-sun");
    $("#ModoOscuro i").fadeIn(2000);
    $("#ModoOscuro i").removeClass("ai-moon");
    $("body").removeClass("bg-light");
    $("header").removeClass("navbar-light");
    $("header").removeClass("bg-light");

    $("body").addClass("bg-dark");
    $("header").addClass("navbar-dark");
    $("header").addClass("bg-dark");

    $(".textoTema").text("Claro");
    $(".estiloGeneral").addClass("bg-faded-primary");
    $(".estiloGeneralSubmenu").addClass("bg-dark");
    //$("h1,h2,h3,h4,h5,h6, span, p, i, a").removeClass("text-dark");
    $("h1,h2,h3,h4,h5,h6, span, p, i, a").addClass("text-light");
    let urlimg = base_url + "img/logo/CoinpinverHorizontal-white.png";
    $("img[id=iconoCoinpinver]").attr("src", urlimg);
    $("img[id=iconoCoinpinverDispositivo]").attr("src", urlimg);

    $(".seccion2").removeClass("bg-secondary");
    $(".seccion3").css({ "background-image": "" });
    $(".seccion4").removeClass("bg-faded-primary");
    $(".seccion5").removeClass("bg-faded-secondary");
    $(".seccion6").removeClass("bg-faded-primary");
    $(".seccion7").addClass("bg-faded-primary");
    $(".menuDispositivo").addClass("text-light");
    $("#primaryMenu").addClass("bg-dark");
    $(".textoEarn").addClass("text-dark");
    $(".linktextoEarn").removeClass("text-light");
    $(".linktextoEarn").addClass("text-primary");
    $(".divsecciones").addClass("bg-dark");
    $(".textodivseecion").addClass("text-light");
    $(".textoQuienSomos").addClass("text-light");
    $(".textoMenuPerfil").addClass("text-dark");
    $(".textoEducacion").addClass("text-dark");
    $(".textoWhitePaper").addClass("text-light");
    $(".textoWhitePaper h3").addClass("text-light");
    $(".textoWhitePaper p").addClass("text-light");
    $(".oscuro").addClass("bg-dark");
    $(".textoCambia").addClass("text-light");
    let urlimgP = base_url + "img/coinpinver/Inicio/vih_whitepaper_white.png";
    $(".imgPlataformas2").attr("src",urlimgP);

}

function showNotification(title, text, color) {

    $.gritter.add({
        title: title,
        text: text,
        time: '',
        class_name: 'color ' + color
    });
}

function validaEmail(elemento) {
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if ($("#" + elemento).val().length >= 1 || typeof($("#" + elemento).val()) === "undefined") {
        if (regex.test($("#" + elemento).val())) {
            return true;
        } else {
            showNotification("!Alerta¡", "El formato del correo es incorrecto, ejemplo: <strong>usuario@dominio.com<strong>", "warning");
        }
    }
}

function Accion_JQuery(formulario, controlador, elemento_respuesta, tituloEsperando, mensajeEsperando, banderaRecargaDatos) {
    if (tituloEsperando !== "") {
        showEsperando(tituloEsperando, mensajeEsperando);
    }

    var formData = new FormData(document.getElementById(formulario));
    $.ajax({
        type: 'POST',
        url: base_url + 'index.php/' + controlador,
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(resp) {
            $('#' + elemento_respuesta).attr('disabled', false).html(resp);
        },
        complete: function(resp) {
            setTimeout(hideEsperando, 500);
            if (banderaRecargaDatos === 1) {
                recargaDatos();
            }
        }
    });
}

function showEsperando(titulo, mensaje) {
    $("#titulo-esperando").html("¡" + titulo + "!");
    $("#texto-esperando").html(mensaje + ".<br> Espera un momento...");

    $("#modalCentered").modal("show");
}

function hideEsperando() {
    $("#titulo-esperando").html("Espere un momento por favor");
    $("#texto-esperando").html("Estamos procesando la información");

    $("#modalCentered").modal("hide");
}

function maxLenght(elemento, posiciones) {
    var valueElement = $(elemento).val();
    var numPosElement = valueElement.length;

    if (numPosElement > posiciones) {
        var auxValElement = valueElement.substr(0, posiciones);
        $(elemento).val(auxValElement);
    }
}

function validarNumeros(elemento) {
    var valor = $(elemento).val();
    $(elemento).val(valor.replace(/[^0-9]/g, ""));
}

function validarUsuario(elemento) {
    var valor = $(elemento).val();
    $(elemento).val(valor.replace(/[^0-9a-zA-Z._]/g, ""));
}

function validaNuevaContrasenia(elemento) {
    var contrasenia = $(elemento).val();

    $("#bar-password").hide();
    $("#valid-password").css("width", "100%");
    $("#valid-password").attr("class", "progress-bar bg-info");
    $("#text-valid-password").html("Validando seguridad de la contraseña...");

    $("#bar-check-password").hide();
    $("#valid-check-password").css("width", "100%");
    $("#valid-check-password").attr("class", "progress-bar bg-info");
    $("#text-valid-check-password").html("Validando coincidencia de la contraseñas...");

    var mayusculas = 0;
    var numeros = 0;
    var signos = 0;
    var bandera = 0;

    if (contrasenia !== "") {
        $("#bar-password").show();

        var tamanioContrasenia = contrasenia.length;

        if (tamanioContrasenia >= 8) {
            var hasta = tamanioContrasenia;
            var x = 0;
            while (hasta > 0) {
                var caracter = contrasenia.charAt(x);
                mayusculas += existeCaracter(caracter, 'mayusculas');
                numeros += existeCaracter(caracter, 'numeros');
                signos += existeCaracter(caracter, 'signos');

                hasta--;
                x++;
            }

            if (mayusculas > 0) {
                bandera++;
            }
            if (numeros > 0) {
                bandera++;
            }
            if (signos > 0) {
                bandera++;
            }

            switch (bandera) {
                case 1: //DEBIL
                    $("#valid-password").css("width", "25%");
                    $("#valid-password").attr("class", "progress-bar bg-danger");
                    $("#text-valid-password").attr("class", "progress-label text-danger");
                    $("#text-valid-password").html('<i class="ai-x-circle text-danger"></i> La contraseña es debil');
                    break;

                case 2: //ACEPTABLE
                    $("#valid-password").css("width", "50%");
                    $("#valid-password").attr("class", "progress-bar bg-warning");
                    $("#text-valid-password").attr("class", "progress-label text-warning");
                    $("#text-valid-password").html('<i class="ai-alert-triangle text-warning"></i> La contraseña es aceptable');
                    break;

                case 3: //SEGURA
                    $("#valid-password").css("width", "100%");
                    $("#valid-password").attr("class", "progress-bar bg-success");
                    $("#text-valid-password").attr("class", "progress-label text-success");
                    $("#text-valid-password").html('<i class="ai-check-square text-success"></i> La contraseña es segura');
                    break;
            }
            //$("#VPag_Suscripcion\\:contraseniaSuscriptor").removeAttr("disabled");
        } else {
            //$("#VPag_Suscripcion\\:contraseniaSuscriptor").attr("disabled","true");
            $("#valid-password").attr("class", "progress-bar bg-danger");
            $("#text-valid-password").attr("class", "progress-label text-danger");
            $("#text-valid-password").html('<i class="ai-x-circle text-danger"></i>La nueva contraseña debe tener almenos 8 caracteres');
        }
    } else {
        //$("#VPag_Suscripcion\\:contraseniaSuscriptor").attr("disabled","true");
    }
}

function existeCaracter(caracter, grupo) {
    var Grupo2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var Grupo3 = "0123456789";
    var Grupo4 = String.fromCharCode(35, 36, 37, 38, 40, 41, 42, 43, 45, 61, 63, 91, 93, 95, 123, 125, 191);
    var cont = 0;

    switch (grupo) {
        case 'mayusculas':
            if (Grupo2.indexOf(caracter) !== -1) {
                cont++;
            }
            break;
        case 'numeros':
            if (Grupo3.indexOf(caracter) !== -1) {
                cont++;
            }
            break;
        case 'signos':
            if (Grupo4.indexOf(caracter) !== -1) {
                cont++;
            }
            break;
    }

    return cont;
}

function validaCoincidencia(elemento, elemntoCompara) {
    var contraseniaCompara = $("#" + elemntoCompara).val();
    var contraseniaValida = $(elemento).val();

    $("#bar-check-password").hide();
    $("#valid-check-password").css("width", "100%");
    $("#valid-check-password").attr("class", "progress-bar bg-info");
    $("#text-valid-check-password").html("Validando coincidencia de la contraseñas...");

    if (contraseniaValida !== "") {
        $("#bar-check-password").show();
        if (contraseniaCompara === contraseniaValida) {
            $("#valid-check-password").attr("class", "progress-bar bg-success");
            $("#text-valid-check-password").attr("class", "progress-label text-success");
            $("#text-valid-check-password").html('<i class="ai-check-square text-success"></i> Las contraseñas coinciden');
        } else {
            $("#valid-check-password").attr("class", "progress-bar bg-danger");
            $("#text-valid-check-password").attr("class", "progress-label text-danger");
            $("#text-valid-check-password").html('<i class="ai-x-circle text-danger"></i> Las contraseñas no coinciden');
        }
    }

}

function FormModal(titulo, controlador, formulario, tamanoModal) {

    $("#tamanoModal").removeClass();
    if (tamanoModal == '') {
        tamanoModal = 'modal-xl';
    }

    $("#respuesta_formulario").empty();

    $("#titulo_modalForm").html(titulo);
    //if (tipoModal == 1) { // recibe formulario
    //showEsperando("Espere un momento", "Cargando información.");

    $.ajax({
        type: "POST",
        url: base_url + "index.php/" + controlador,
        data: $("#" + formulario).serialize(),
        success: function(resp) {
            $('#respuesta_formulario').attr('disabled', false).html(resp);
        },
        complete: function(XMLHttpRequest, textStatus) {
            hideEsperando();
        },
        error: function() {
            showEsperando("Error", "Ocurrio un error, estamos trabajando para solventarlo");

        }
    });
    //}
    /*if (tipoModal == 2) { //no recibe formulario
        Procesando('<strong>Espere un momento...</strong>');
        $.ajax({
            type: 'POST',
            url: base_url + 'index.php/' + controlador,
            data: {},
            success: function(resp) {
                $('#respuesta_formulario').attr('disabled', false).html(resp);
                $("#titulo_modalForm").text(titulo);
                setTimeout(cerrarProcesando, 500);
            },
            complete: function (XMLHttpRequest, textStatus) {
                   setTimeout(cerrarProcesando, 500);
            },
            error: function () {
                EnviaAlerta("error","","¡¡Ocurrio un error al cargar la información!!");
            }
        });
    }*/
    $("#tamanoModal").addClass("modal-dialog modal-dialog-centered " + tamanoModal);
    $("#modalForm").modal("show");


}

function EnviaFormulario(controlador, formulario, elemento_respuesta) {

    $("#" + elemento_respuesta).empty();

    //showEsperando("Espere un momento", "Cargando información.");

    $.ajax({
        type: "POST",
        url: base_url + "index.php/" + controlador,
        data: $("#" + formulario).serialize(),
        success: function(resp) {
            $('#' + elemento_respuesta).attr('disabled', false).html(resp);
        },
        complete: function(XMLHttpRequest, textStatus) {
            hideEsperando();
        },
        error: function() {
            showEsperando("Error", "Ocurrio un error, estamos trabajando para solventarlo");

        }
    });

}

function IrApartado(elemento, tiempo) {
    $("html, body").animate({ scrollTop: $("#" + elemento).offset().top }, tiempo);
}

function detectarDispositivo() {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        return 1;
    } else {
        return 2;
    }
}