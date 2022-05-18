$(function(){
    $("#username").keyup(function() {
        maxLenght(this,45);
    });
    $("#paternoUsuario").keyup(function() {
        maxLenght(this,45);
    });
    $("#maternoUsuario").keyup(function() {
        maxLenght(this,45);
    });
    $("#aliasUsuario").keyup(function() {
        maxLenght(this,40);
    });
    $("#emailUsuario").keyup(function() {
        maxLenght(this,45);
        //validaEmail(this);
    });

    
    $("#vscsContrasenia").keyup(function() {
        maxLenght(this,14);
        validaNuevaContrasenia(this);
    });
    $("#vscsContraseniaConfir").keyup(function() {
        maxLenght(this,14);
        validaCoincidencia(this, "vscsContrasenia")
    });
    $("#setUsuario").on("submit", function(event) {
        event.preventDefault();
        validaFormUsuario(this);
    });
    /*
    $("button[id=btn-login]").click(function()
    {
        let formulario = "iniciarSesion";
        let controlador = "setSesion";
        let respuesta = "result-login";
        EnviaForm(formulario, controlador, respuesta);
    });
    */
    $("#btn-login").click(function() {
        validaFormLogin();
    });
});
function validaFormLogin() {

    if($("#userMail").val().length >= 1) {
        
        if($("#password").val().length >= 1) {
            
            Accion_JQueryJSISS("iniciarSesion", "ControlAcceso", "result-login", "Iniciando sesión", "Estamos validando tus datos", 1);
        } else {
            showNotification("!Alerta¡", "El campo <strong>contraseña</strong> esta vacio. Favor de llenarlo", "warning");
        }
    } else {
        showNotification("!Alerta¡", "El campo <strong>Usuario o correo electrónico</strong> esta vacio. Favor de llenarlo", "warning");
    }
}
function validaFormUsuario(formulario) {
    var banderaSubmit = 0;

    
    if($("#aliasUsuario").val().length <= 0) { banderaSubmit++; }
    if($("#emailUsuario").val().length <= 0) { banderaSubmit++; }
    if($("#vscsContrasenia").val().length < 8) { banderaSubmit++; }
    if($("#vscsContraseniaConfir").val().length < 8) { banderaSubmit++; }
    


    if(banderaSubmit <= 0) {
        var banderaCorreo = validaCorreo($("#emailUsuario").val());
        
        if( banderaCorreo == false)
        {
            showNotification("!Alerta¡", "El Formato del correo es incorrecto, ejemplo: usuario@dominio.com", "warning");
        }
        else
        {
            if($("#vscsContraseniaConfir").val() === $("#vscsContrasenia").val()) {
                $(formulario).unbind('submit').submit();
            } else {
                showNotification("!Alerta¡", "Las contraseñas no coinciden. Favor de verificar", "warning");
            } 
        }

        
    } else {
        showNotification("!Alerta¡", "Los campos marcados con <strong>(*)</strong> son obrigatorios. Favor de no dejarlos en blanco", "warning");
    }
}
function Accion_JQueryJSISS(formulario, controlador, elemento_respuesta, tituloEsperando, mensajeEsperando, banderaRecargaDatos) {
    if(tituloEsperando !== "") {
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
            if(banderaRecargaDatos === 1) {
                recargaDatos();
            }
        }
    });
}
function EnviaForm(formulario, controlador, respuesta)
{
    $.ajax({
        type: "POST",
        url: base_url + "index.php/" + controlador,
        data: $("#" + formulario).serialize(),
        success: function(resp) {
            $('#'+respuesta).attr('disabled', false).html(resp);
        },
        complete: function (XMLHttpRequest, textStatus) {
               hideEsperando();
        },
        error: function () {
            showEsperando("Error", "Ocurrio un error, estamos trabajando para solventarlo");
            
        }
    });
}
function recargaDatos() {
    var banderaAcceso = $("#banderaAcceso").val();

    switch(banderaAcceso) {
        case 'TRUE-ACCESS':
            window.location.replace(base_url + "index.php/PerfilUsuario");
        break;
        case 'TRUE-CONFIRMA':
            window.location.replace(base_url + "index.php/ConfirmaCuentaUsuario/" + $("#hashUsuario").val());
        break;
    }
}
function validaCorreo(email)
{
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if (regex.test(email)) 
    {
        return true;
    } 
    else 
    {
        
        return false;
    }
}
function CorrectoReporte(title, text, color)
{
    showNotification(title, text, color);
}