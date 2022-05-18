$(function() {
	$("button[id=btn-action]").click(function() {
		setActionRecoveryAction(this);
	});

	$("#userMail").keyup(function() {
		maxLenght(this,50);
	});

	$("#codigoSeguridad").keyup(function() {
		maxLenght(this,6);
		validarNumeros(this);
	});

	$("#vscsContrasenia").keyup(function() {
		maxLenght(this,14);
		validaNuevaContrasenia(this);
	});

	$("#contraseniaSuscriptor").keyup(function() {
		maxLenght(this,14);
		validaCoincidencia(this, "vscsContrasenia")
	});
});

function setActionRecoveryAction(btn) {
	var valueElement = $(btn).attr("value-element");
		
	var banderaAction = 0;
	var tituloEspera = "";
	var mensajeEspera = "";
	var route = "";

	$("#value-element").val($(btn).attr("value-element"));
	$("#value-step").val($(btn).attr("value-step"));
	$("#value-position").val($(btn).attr("value-position"));

	switch(valueElement) {
		case 'enviar-codigo-seguridad':
			if($("#userMail").val().length >= 1) {
				banderaAction = 1;
				tituloEspera = "Enviando código";
				mensajeEspera = "Estamos enviando el codigo de seguridad a tu correo electrónico";
				route = "SendCodeSecurity";
			} else {
				showNotification("!Alerta¡", "El campo <strong>correo electrónico o nombre de usuario</strong> esta vacio. Favor de llenarlo", "warning");
			}
		break;

		case 'validar-codigo-seguridad':
			if($("#codigoSeguridad").val().length >= 1) {
				banderaAction = 1;
				tituloEspera = "Validando código";
				mensajeEspera = "Estamos validando el codigo de seguridad que escribiste";
				route = "ValidateCodeSecurity";
			} else {
				showNotification("!Alerta¡", "El campo <strong>código de seguridad</strong> esta vacio. Favor de llenarlo", "warning");
			}
		break;

		case 'cambiar-contrasenia':
			if($("#vscsContrasenia").val().length >= 1) {
				if($("#contraseniaSuscriptor").val().length >= 1) {
					banderaAction = 1;
					tituloEspera = "Cambiando contraseña";
					mensajeEspera = "Estamos modificando tu contraseña nueva para tu seguridad";
					route = "ChangePassword";
				} else {
					showNotification("!Alerta¡", "El campo <strong>confirma contraseña</strong> esta vacio. Favor de llenarlo", "warning");
				}
			} else {
				showNotification("!Alerta¡", "El campo <strong>contraseña</strong> esta vacio. Favor de llenarlo", "warning");
			}
		break;

		case 'return-step':
			showContainerRecoveryPassword();
		break;
	}

	if(banderaAction === 1) {
		Accion_JQuery("restaurarContraseniaSuscriptor", route, "result-recovery-password", tituloEspera, mensajeEspera, 1);
	}
}

function recargaDatos() {
	var banderaRecoveryPasswordEnviarCodigo = $("#banderaRecoveryPasswordEnviarCodigo").val();
	var banderaRecoveryPasswordValidaCodigo = $("#banderaRecoveryPasswordValidaCodigo").val();
	var banderaRecoveryPasswordChangePassword = $("#banderaRecoveryPasswordChangePassword").val();

	if(typeof(banderaRecoveryPasswordEnviarCodigo) !== "undefined") {
		if(banderaRecoveryPasswordEnviarCodigo === "TRUE") {
			showContainerRecoveryPassword();
		}
	}

	if(typeof(banderaRecoveryPasswordValidaCodigo) !== "undefined") {
		if(banderaRecoveryPasswordValidaCodigo === "TRUE") {
			showContainerRecoveryPassword();
		}
	}

	if(typeof(banderaRecoveryPasswordChangePassword) !== "undefined") {
		if(banderaRecoveryPasswordChangePassword === "TRUE") {
			showContainerRecoveryPassword();
		}
	}
}

function showContainerRecoveryPassword() {
	var valueElement = $("#value-element").val();
	var valueStep = $("#value-step").val();
	var valuePosition = $("#value-position").val();

	for(var x = 1; x <= 4; x++) {
		$("#step" + x + "RecoceryPassword").attr("class","text-danger");
		$("#step" + x + "RecoceryPasswordIcon").attr("class","fs-md ai-x-circle");
		$("#step" + x + "RecoceryPasswordContainer").hide();
	}

	for(var y = valuePosition; y >= 1; y--) {
		$("#step" + y + "RecoceryPassword").attr("class","text-success");
		$("#step" + y + "RecoceryPasswordIcon").attr("class","fs-md ai-check-circle");
	}

	switch(valueElement) {
		case 'return-step':
			$("#" + valueStep).attr("class","text-warning");
			$("#" + valueStep + "Icon").attr("class","fs-md ai-alert-circle");
		break;

		default:
			$("#" + valueStep).attr("class","text-warning");
			$("#" + valueStep + "Icon").attr("class","fs-md ai-alert-circle");
		break;
	}
	
	$("#" + valueStep + "Container").fadeIn();
}