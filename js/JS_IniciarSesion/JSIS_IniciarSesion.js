$(function() {
	$("#aliasUsuario").keyup(function(e) {
		maxLenght(this,50);

	});
    $("#aliasUsuario").keyup(function(){              
            var ta = $("#aliasUsuario");
            letras = ta.val().replace(/ /g, "");
            ta.val(letras)
    });
    
    $("#aliasUsuario").keyup(function(){              
        var input_val = $(this).val();
        var inputRGEX = /^[a-zA-Z0-9_.]*$/;
        var inputResult = inputRGEX.test(input_val);
          if(!(inputResult))
          {     
            this.value = this.value.replace(/[^a-zA-Z0-9_.\s]/gi, '');
          }
    });
    
	$("#password").keyup(function() {
		maxLenght(this,14);
	});

	$("#btn-login").click(function() {
		validaFormLogin();
	});
	$("#vscsContrasenia").keyup(function() {
        maxLenght(this,14);
        validaNuevaContrasenia(this);
    });
    $("#vscsContraseniaConfir").keyup(function() {
        maxLenght(this,14);
        validaCoincidencia(this, "vscsContrasenia");
    });
	$("#setUsuario").on("submit", function(event) {
        event.preventDefault();
        validaFormUsuario(this);
    });
});

function validaFormLogin() {
	if($("#userMail").val().length >= 1) {
		if($("#password").val().length >= 1) {
			Accion_JQuery("iniciarSesion", "ControlAcceso", "result-login", "Iniciando sesión", "Estamos validando tus datos", 1);
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
        //validar usuario 
        /*
            var rege = /^([A-Za-z0-9])+\_.([A-Za-z0-9])$/;
            if(rege.test($('#aliasUsuario').val()))
            { 
                
                console.log("usuario correocto");
            }
            else
            {
                console.log("incorrecto")
            }
        */
        if($("#aliasUsuario").val().length <= 8)
        {
            showNotification("!Alerta¡", "El usuario debe contener minimo 8 caracteres", "warning"); 
            $("#aliasUsuario").focus();
            return; 

        }

        var banderaCorreo = validaCorreo($("#emailUsuario").val());
        //console.log(banderaCorreo);
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