$(function() {
	$("#codigoSeguridad").click(function() {
		maxLenght(this,6);
		validarNumeros(this);
	});

	$("#enviar-correo-confirmacion").click(function() {
		setCorreoConfirma();
	});

	$("#btn-confirma-cuenta").click(function() {
		validaFormConfirmaCuenta();
	});
});

function validaFormConfirmaCuenta() {
	if($("#codigoSeguridad").val().length >= 1) {
		Accion_JQuery("confirmaCuentaSuscriptor", "SetConfirmaCuentaSuscriptor", "result-confirma", "Validando tu información", "Estamos validando tu cuenta", 1);
	} else {
		showNotification("!Alerta¡", "El campo <strong>Código de seguridad</strong> esta vacio. Favor de llenarlo", "warning");
	}
}

function setCorreoConfirma() {
	Accion_JQuery("confirmaCuentaSuscriptor", "ReenviarConfirmaCuentaSuscriptor", "result-confirma", "Reenviando correo electrónico", "Ingresa a tu correo electrónico para visualizar tu codigo se seguridad", 1);
}

function recargaDatos() {
	var banderaReenviaCorreo = $("#banderaReenviaCorreo").val();
	var banderaConfirmaCuenta = $("#banderaConfirmaCuenta").val();


	if(typeof(banderaReenviaCorreo) !== "undefined") {
		if(banderaReenviaCorreo === "FALSE-NO-EXIST") {
			window.location.replace(base_url + "index.php/IniciarSesion");
		}
	}

	if(typeof(banderaConfirmaCuenta) !== "undefined") {
		if(banderaConfirmaCuenta === "TRUE") {
			window.location.replace(base_url + "index.php/ConfirmaCuentaSuscriptor/" + $("#hashSuscriptor").val());
		}
	}
}