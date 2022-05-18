$(function() {

	$("#btn-change-photo").click(function() {
		getChangePhoto();
	});

	$("#fotoSuscriptor").change(function(evt) {
		previewPhoto(evt);

	});

	$("#btn-update-fotografia-suscriptor").click(function() {
		setCambiaFotografiaSuscriptor();
	});

	$("#telefonoSuscriptor").keyup(function() {
		maxLenght(this,15);
		validarNumeros(this);
	});
	
	$("#btn-update-data-suscriptor").click(function() {
		validaFormLogin();
	});
});

function validaFormLogin() {
	if($("#nombreSuscriptor").val().length >= 1) {
		if($("#apellidosSuscriptor").val().length >= 1) {
			if($("#idSexo").val() !== "NULL") {
				if($("#telefonoSuscriptor").val().length >= 1) {
					if($("#idPais").val() !== "NULL") {
						Accion_JQuery("updateDatosSuscriptor", "UpdateInformacionPersonalSuscriptor", "result-update-data-suscriptor", "Actualizando tu información", "Estamos modificando la información con la informacion que proporcionaste", 1);
					} else {
						showNotification("!Alerta¡", "El campo <strong>Pais</strong> esta vacio. Favor de llenarlo", "warning");
					}
				} else {
					showNotification("!Alerta¡", "El campo <strong>Telefono</strong> esta vacio. Favor de llenarlo", "warning");
				}
			} else {
				showNotification("!Alerta¡", "El campo <strong>Sexo</strong> esta vacio. Favor de llenarlo", "warning");
			}
		} else {
			showNotification("!Alerta¡", "El campo <strong>Apellido(s)</strong> esta vacio. Favor de llenarlo", "warning");
		}
	} else {
		showNotification("!Alerta¡", "El campo <strong>Nombre(s)</strong> esta vacio. Favor de llenarlo", "warning");
	}
}

function setCambiaFotografiaSuscriptor() {
	if($("#fotoSuscriptor").val().length >= 1) {
		Accion_JQuery("cambiaFotografiaSuscriptor", "SetModificaFotografiaSuscriptor", "result-confirma", "Modificando fotografía", "Estamos cambiando tu fotografía por la que seleccionaste", 1);
	} else {
		showNotification("!Alerta¡", "El campo <strong>de la fotografía</strong> esta vacio. Favor de llenarlo", "warning");
	}
}

function recargaDatos() {
	var banderaAccionesPerfilSuscriptor = $("#banderaAccionesPerfilSuscriptor").val();
	var valueAction = $("#banderaAccionesPerfilSuscriptor").attr("value-action");
	var valueElement = $("#banderaAccionesPerfilSuscriptor").attr("value-element");

	switch(valueAction) {
		case 'UPDATE':
			switch(valueElement) {
				case 'FOTOGRAFIA':
					if(banderaAccionesPerfilSuscriptor === "TRUE") {
						window.location.replace(base_url + "index.php/PerfilSuscriptor");
					}
				break;
				case 'DATOS-GENERALES-SUSCRIPTOR':
					if(banderaAccionesPerfilSuscriptor === "TRUE") {
						window.location.replace(base_url + "index.php/PerfilSuscriptor");
					}
				break;
			}
		break;
	}
}

function getChangePhoto() {
	$("#modalFormChangePhoto").modal("show");
}

function previewPhoto(elemento) {
	$("#preview-photo").hide();
	if(elemento.target.files[0].size <= 5000000) {

		var ext = elemento.target.files[0].name.split('.').pop();

		if(ext === "jpg" || ext === "JPG" || ext === "png" || ext === "PNG") {
			let reader = new FileReader();
			reader.readAsDataURL(elemento.target.files[0]);
			$("preview-photo").hide();

			reader.onload = function(){
				let preview = document.getElementById("photo-tmp"),
				image = document.createElement("img");
				image.setAttribute("class", "img-avatar-perfil");
				image.src = reader.result;
				preview.innerHTML = '';
				preview.append(image);
				$("#preview-photo").show();
			};
		} else {
			$("#photo-tmp").html("");
			$("#fotoSuscriptor").val("");
			showNotification("!Alerta¡", "El formato de la fotografía es <strong>*.png o *.jpg</strong>, intenta subir otra fotografía", "warning");
		}
	} else {
		$("#photo-tmp").html("");
		$("#fotoSuscriptor").val("");
		showNotification("!Alerta¡", "El tamaño permitido para tu fotografía es de 5Mb, intenta subir otra fotografía", "warning");
	}
}

/*function recargaDatos() {
	var banderaUpdate = $("#banderaUpdate").val();

	if(banderaUpdate === "TRUE") {
		window.location.replace(base_url + "index.php/PerfilSuscriptor");
	}
}*/