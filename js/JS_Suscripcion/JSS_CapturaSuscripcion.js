$(function() {
	$("#nombreSuscriptor").keyup(function() {
		maxLenght(this,150);
	});

	$("#apellidosSuscriptor").keyup(function() {
		maxLenght(this,150);
	});

	$("#emailSuscriptor").keyup(function() {
		maxLenght(this,50);
		validarEmail(this);
	});

	$("#usuarioSuscriptor").keyup(function() {
		maxLenght(this,20);
		validarUsuario(this);
	});

	$("#vscsContrasenia").keyup(function() {
		maxLenght(this,14);
	});

	$("#contraseniaSuscriptor").keyup(function() {
		maxLenght(this,14);
	});

	$("#vscsContrasenia").keyup(function() {
		validaNuevaContrasenia(this);
	});

	$("#contraseniaSuscriptor").keyup(function() {
		validaCoincidencia(this, "vscsContrasenia")
	});

	$("#setSuscripcion").on("submit", function(event) {
		event.preventDefault();
		validaFormSuscripcion(this);
	});
});

function validaFormSuscripcion(formulario) {
	var banderaSubmit = 0;

	if($("#nombreSuscriptor").val().length <= 0) { banderaSubmit++; }
	if($("#apellidosSuscriptor").val().length <= 0) { banderaSubmit++; }
	if($("#emailSuscriptor").val().length <= 0) { banderaSubmit++; }
	if($("#usuarioSuscriptor").val().length <= 0) { banderaSubmit++; }
	if($("#vscsContrasenia").val().length < 8) { banderaSubmit++; }
	if($("#contraseniaSuscriptor").val().length < 8) { banderaSubmit++; }


	if(banderaSubmit <= 0) {
		if($("#contraseniaSuscriptor").val() === $("#vscsContrasenia").val()) {
			$(formulario).unbind('submit').submit();
		} else {
			showNotification("!Alerta¡", "Las contraseñas no coinciden. Favor de verificar", "warning");
		}
	} else {
		showNotification("!Alerta¡", "Los campos marcados con <strong>(*)</strong> son obrigatorios. Favor de no dejarlos en blanco", "warning");
	}
}

