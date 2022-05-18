$(function() {
	$("#userMail").keyup(function() {
		maxLenght(this,50);
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
	$("#setPerfilUsuario").on("submit", function(event) {
        event.preventDefault();
        validaFormUsuario(this);
    });
    $("#fotoUsuario").change(function(){
    	let ext_aceptada = "jpg";
    	let mensaje = "El documento no es correcto";
    	ValidaArchivo(this, mensaje);
    });
    $("a[id=menu]").click(function()
    {
        var route = $(this).attr("value-route");
        IrApartado("contenidoMenu", 1000);
        if(typeof(route) === "undefined")
        {
            refrescaPagina();
        }
        else
        {
            let formulario = "form";
            let elemento_respuesta = "contenidoMenu";
            EnviaFormulario(route, formulario, elemento_respuesta);    
        }
        
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

    if($("#username").val().length <= 0) { banderaSubmit++; }
    if($("#paternoUsuario").val().length <= 0) { banderaSubmit++; }
    if($("#maternoUsuario").val().length <= 0) { banderaSubmit++; }
    if($("#fechaNacimientoUsuario").val().length <= 0) { banderaSubmit++; }
    if($("#idPais").val().length <= 0) { banderaSubmit++; }
    if($("#idSexo").val().length <= 0) { banderaSubmit++; }
    if($("#fotoUsuario").val().length <= 0) { banderaSubmit++; }
    


    if(banderaSubmit <= 0) {
        $(formulario).unbind('submit').submit();
        
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
function ValidaArchivo(all, mensaje) {

    var extensiones_permitidas = [".png", ".jpg", ".jpeg"];
    var tamano = 8; // EXPRESADO EN MB.
    var rutayarchivo = all.value;
    var ultimo_punto = all.value.lastIndexOf(".");
    var extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
    if(extensiones_permitidas.indexOf(extension) == -1)
    {
        //alert("Extensión de archivo no valida");
        showNotification("¡Alerta!", "El archivo no es correcto, debe ser extension png, jpg o jpeg", "warning");
        document.getElementById(all.id).value = "";
        return; // Si la extension es no válida ya no chequeo lo de abajo.
    }

    // if((all.files[0].size / 1048576) > tamano)
    // {
    //     alert("El archivo no puede superar los "+tamano+"MB");
    //     document.getElementById(all.id).value = "";
    //     return;
    // }
}
function refrescaPagina()
{
    location.reload();
}