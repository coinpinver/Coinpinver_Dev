$(function() {
	$("#nombreContacto").keyup(function() {
		maxLenght(this,100);
	});

	$("#emailContacto").keyup(function() {
		maxLenght(this,50);
	});
	
	$("#mensajeContacto").keyup(function() {
		maxLenght(this,250);
	});
	
	$("#getContacto").on("submit", function(event) {
		event.preventDefault();
		validaFormContacto(this);
	});
});

function validaFormContacto(formulario) {
	var banderaSubmit = 0;

	if($("#nombreContacto").val().length <= 0) { banderaSubmit++; }
	if($("#emailContacto").val().length <= 0) { banderaSubmit++; }
	if($("#mensajeContacto").val().length <= 0) { banderaSubmit++; }

	if(banderaSubmit >= 1) {
		showNotification("!Alerta¡", "Los campos marcados con <strong>(*)</strong> son obrigatorios. Favor de no dejarlos en blanco", "warning");
	} else {
		var banderaEmail = validaEmail("emailContacto");
		if(banderaEmail === true) {
			$(formulario).unbind('submit').submit();
		}
	}
}