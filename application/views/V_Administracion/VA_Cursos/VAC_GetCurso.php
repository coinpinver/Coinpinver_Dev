<?php

$datosGeneralesCurso = $informacion["datosGeneralesCurso"];
$datosImagenCurso = $informacion["datosImagenCurso"];
$datosCostosCurso = $informacion["datosCostosCurso"];

?>
<div class="bg-size-cover overflow-hidden pt-5 pb-5 bg-administracion">
	<div class="container position-relative zindex-5">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-8 text-center">
				<h1 class="display-4 text-light">Administración del contenido de cursos</h1>
			</div>
		</div>
	</div>
</div>

<div class="mb-3">
<label class="form-label" for="format-time">Time</label>
<input class="form-control" type="text" id="format-time" data-format="time" placeholder="hh:mm:ss">
</div>


<form id="setInformacionCurso" name="setInformacionCurso" method="POST" action="<?=base_url("index.php/Administracion-SetInformacionCurso")?>" enctype="multipart/form-data">
	<div class="container-fluid">
		<input type="hidden" id="actionSeccion" name="actionSeccion" class="form-control form-control-sm oculto"></input>
		<input type="hidden" id="seccionAccionada" name="seccionAccionada" class="form-control form-control-sm oculto"></input>
		<input type="hidden" id="hashCurso" name="hashCurso" value="<?=$informacion['hashCurso']?>" class="form-control form-control-sm oculto"></input>
	</div>

	<div class="container-fluid mt-4 mb-4">
		<div class="row mb-4">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="row">
					<div class="col-12 mb-4">
						<div class="card">
							<div class="card-header card-title">
								Datos generales del curso
								<?php
								if($datosGeneralesCurso["edit"] == "true") {
									echo "<div class='tools text-end text-nowrap'>";
										echo "<i class='ai-edit' id='editInfo' value-element='datGralCurso'></i>";
										echo "<i class='ai-refresh-cw' id='noEditInfo' value-element='datGralCurso'></i>";
									echo "</div>";
								}
								?>
							</div>
							<div class="card-body">

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="nombreCurso">Nombre:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3" id="label-datGralCurso"><?=$datosGeneralesCurso["nombreCurso"]?></span>
										<input type="text" name="nombreCurso" id="nombreCurso" value="<?=$datosGeneralesCurso["nombreCurso"]?>" class="form-control form-control-sm" placeholder="Escribe tu nombre" autocomplete="off" maxlength="150" alt="data-datGralCurso">
									</div>
								</div>

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="descripGeneralCurso">Descripción general:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3" id="label-datGralCurso"><?=$datosGeneralesCurso["descripGeneralCurso"]?></span>
										<textarea class="form-control fs-sm" name="descripGeneralCurso" id="descripGeneralCurso" autocomplete="off" maxlength="150" alt="data-datGralCurso"><?=$datosGeneralesCurso["descripGeneralCurso"]?></textarea>
									</div>
								</div>

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="descripEspecificaCurso">Descripción Especifica:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3" id="label-datGralCurso"><?=$datosGeneralesCurso["descripEspecificaCurso"]?></span>
										<textarea class="form-control fs-sm" name="descripEspecificaCurso" id="descripEspecificaCurso" rows="5" autocomplete="off" maxlength="150" alt="data-datGralCurso"><?=$datosGeneralesCurso["descripEspecificaCurso"]?></textarea>
									</div>
								</div>

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="idNivelCurso">Nivel:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3" id="label-datGralCurso"><?=$datosGeneralesCurso["descripNivelCurso"]?></span>
										<div class="form-check" alt="data-datGralCurso">
											<?php
											foreach($informacion["datosCatNivelCurso"] as $datosCatNivelCurso) {
												$checked = "";
												if($datosGeneralesCurso["idNivelCurso"] == $datosCatNivelCurso->idNivelCurso) {
													$checked = "checked";
												}

												echo "<div class='form-check form-check-inline mb-2'>";
													echo "<input type='radio' id='nivel-" . $datosCatNivelCurso->idNivelCurso . "' name='idNivelCurso' value='" . $datosCatNivelCurso->idNivelCurso . "' class='form-check-input' title='Nivel del curso' " . $checked . ">";
													echo "<label class='form-check-label' for='nivel-" . $datosCatNivelCurso->idNivelCurso . "'>" . $datosCatNivelCurso->descripNivelCurso . "</label>";
												echo "</div>";
											}
											?>
										</div>
									</div>
								</div>

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="nombreSuscriptor">Estatus:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3"><?=$datosGeneralesCurso["descripEstatusCurso"]?></span>
									</div>
								</div>

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="nombreSuscriptor">Fecha de creación:</label>
									<div class="col-sm-12 col-md-4 col-lg-4">
										<span class="fs-sm mt-md-3 mt-lg-3"><?=$datosGeneralesCurso["fechaCreacionCurso"]?></span>
									</div>
									<?php
										if(array_key_exists("fechaPublicacionCurso", $datosGeneralesCurso)) {
											echo "<label class='col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs' for='nombreSuscriptor'>Fecha de publicación:</label>";
											echo "<div class='col-sm-12 col-md-4 col-lg-4'>";
												echo "<span class='fs-sm mt-md-3 mt-lg-3'>" . $datosGeneralesCurso["fechaPublicacionCurso"] . "</span>";
											echo "</div>";
										}
									?>
								</div>

								<button type="button" id="btn-acciones-seccion" value-element="datGralCurso" value-action="<?=$datosGeneralesCurso["edit"]?>" value-nombre-apartado="Datos generales del curso" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon w-100">
									<i class="ai-save"></i> Guardar
								</button>
							</div>
						</div>
					</div>

					<div class="col-12 mb-4">
						<div class="card">
							<div class="card-header card-title">
								Información de costos
								<?php
								if($datosCostosCurso["edit"] == "true") {
									echo "<div class='tools text-end text-nowrap'>";
										echo "<i class='ai-edit' id='editInfo' value-element='datCostCurso'></i>";
										echo "<i class='ai-refresh-cw' id='noEditInfo' value-element='datCostCurso'></i>";
									echo "</div>";
								}
								?>
							</div>
							<div class="card-body">
								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="idDivisa">Divisa:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3" id="label-datCostCurso"><?=$datosCostosCurso["abreviaturaDivisa"]?> - <?=$datosCostosCurso["descripDivisa"]?></span>
										<select class="form-select form-select-sm" id="idDivisa" name="idDivisa" alt="data-datCostCurso">
											<option value="NULL">Selecciona una moneda</option>
											<?php
											foreach($informacion["datosCatDivisa"] as $datosCatDivisa) {
												$selected = "";
												if($datosCostosCurso["idDivisa"] == $datosCatDivisa->idDivisa) {
													$selected = "selected='selected'";
												}

												echo "<option value='" . $datosCatDivisa->idDivisa . "' " . $selected . ">" . $datosCatDivisa->abreviaturaDivisa . " - " . $datosCatDivisa->descripDivisa . "</option>";
											}

											?>
										</select>
									</div>
								</div>

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="precioActual">Precio actual:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3" id="label-datCostCurso"><?=$datosCostosCurso["precioActual"]?></span>
										<div class="input-group input-group-sm" alt="data-datCostCurso">
											<span class="input-group-text">
												<i class="ai-dollar-sign"></i>
											</span>
											<input type="text" name="precioActual" id="precioActual" value="<?=$datosCostosCurso['precioActual']?>" class="form-control form-control-sm" placeholder="00,00.00" autocomplete="off" maxlength="10">
										</div>
									</div>
								</div>

								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="precioAnterior">Precio anterior:</label>
									<div class="col-sm-12 col-md-10 col-lg-10">
										<span class="fs-sm mt-md-3 mt-lg-3" id="label-datCostCurso"><?=$datosCostosCurso["precioAnterior"]?></span>
										<div class="input-group input-group-sm" alt="data-datCostCurso">
											<span class="input-group-text">
												<i class="ai-dollar-sign"></i>
											</span>
											<input type="text" name="precioAnterior" id="precioAnterior" value="<?=$datosCostosCurso["precioAnterior"]?>" class="form-control form-control-sm" placeholder="00,00.00" autocomplete="off" maxlength="10">
										</div>
									</div>
								</div>

								<button type="button" id="btn-acciones-seccion" value-element="datCostCurso" value-action="<?=$datosCostosCurso["edit"]?>" value-nombre-apartado="Información de costos" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon w-100">
									<i class="ai-save"></i> Guardar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="row">
					<div class="col-12 mb-4">
						<div class="card">
							<div class="card-header card-title">
								Imágen principal del curso
								<?php
								if($datosImagenCurso["edit"] == "true") {
									echo "<div class='tools text-end text-nowrap'>";
										echo "<i class='ai-edit' id='editInfo' value-element='datImgCurso'></i>";
										echo "<i class='ai-refresh-cw' id='noEditInfo' value-element='datImgCurso'></i>";
									echo "</div>";
								}
								?>
							</div>
							<div class="card-body">
								<div class="mb-2 row align-items-center">
									<label class="col-sm-12 col-md-2 col-lg-2 col-form-label fs-xs" for="imagenCurso">Imágen:</label>
									<div class="col-sm-12 col-md-10 col-lg-10 text-center">
										<img src="<?=$datosImagenCurso["urlImgCurso"]?>" class="rounded-3 img-curso" alt="Imagen del curso" id="label-datImgCurso"/>
										<input type="file" name="imagenCurso" id="imagenCurso" class="form-control form-control-sm" alt="data-datImgCurso">
									</div>
								</div>

								<button type="button" id="btn-acciones-seccion" value-element="datImgCurso" value-action="<?=$datosImagenCurso["edit"]?>" value-nombre-apartado="Imágen principal del curso" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon w-100">
									<i class="ai-save"></i> Guardar
								</button>

							</div>
						</div>
					</div>

					<div class="col-12">

						<div class="card">
							<div class="card-header card-title">
								Publicación de curso
							</div>
							<div class="card-body">
								<p class="fs-sm"><strong>Nota:</strong> Antes de publicar el curso, asegurate de que todo este correcto.</p>
								<button type="button" id="btn-adminCursoPrincipal" class="btn btn-outline-success btn-translucent-success btn-sm btn-icon d-block w-100">
									<i class="ai-check-square"></i> Publicar curso
								</button>
							</div>
						</div>


						



					</div>
				</div>
					
			</div>
		</div>
	</div>

	<div class="container-fluid text-center mb-4">
		<hr>
		<h1 class="pt-3">Contenido del curso</h1>
	</div>

	<div class="container-fluid mb-4">
		<div class="row">
			<div class="col-sm-12 col-md-5 col-lg-5 mb-4">
				<div class="card">
					<div class="card-header card-title">
						Administración de módulos
					</div>
					<div class="card-body text-center" id="get-modulos-cursos"></div>
				</div>
			</div>

			<div class="col-sm-12 col-md-7 col-lg-7 mb-4">
				<div class="card">
					<div class="card-header card-title">
						Administración de sesiones
					</div>
					<div class="card-body text-center" id="get-sesiones-modulos"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid text-center mb-4">
		<hr>
		<h1 class="pt-3">Información inherente al curso</h1>
	</div>

	<div class="container-fluid mb-4">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6 mb-4">
				<div class="card">
					<div class="card-header card-title">¿Qué se aprenderá en el curso?</div>
					<div class="card-body text-center">
						<button type="button" class="btn btn-outline-dark btn-translucent-dark btn-sm mb-3">
							<i class="ai-plus-square"></i> Agregar un aprendizaje
						</button>
						<div class="table-responsive">
							<table class="table table-sm">
								<thead>
									<tr>
										<th class="text-center fs-sm" width="5%">#</th>
										<th class="text-center fs-sm" width="82%">Descripción del prendizaje</th>
										<th class="text-center" width="13%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center fs-sm">1</td>
										<td class="text-justify fs-sm">Reconozca la importancia de comprender sus objetivos al abordar una diferencia.</td>
										<td class="text-center">
											<button type="button" class="btn-social bs-warning bs-outline bs-sm">
												<i class="ai-edit"></i> 
											</button>
											<button type="button" class="btn-social bs-danger bs-outline bs-sm">
												<i class="ai-trash-2"></i> 
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-6 mb-4">
				<div class="card">
					<div class="card-header card-title">Preguntas Frecuentes</div>
					<div class="card-body text-center">
						<button type="button" class="btn btn-outline-dark btn-translucent-dark btn-sm mb-3">
							<i class="ai-plus-square"></i> Agregar una pregunta
						</button>
						<div class="table-responsive">
							<table class="table table-sm">
								<thead>
									<tr>
										<th class="text-center fs-sm" width="5%">#</th>
										<th class="text-center fs-sm" width="82%">Pregunta | Respuesta</th>
										<th class="text-center" width="13%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center fs-sm">1</td>
										<td class="text-justify fs-sm">
											
											<p class="fw-bold fs-lmd mb-0">Pregunta número 1</p>
											<p class="fs-dm text-justify mb-0">Esta es la respuesta de la pregunta del curso.Esta es la respuesta de la pregunta del curso.Esta es la respuesta de la pregunta del curso.</p>
								
											<!--<span class="fs-md fw-bold">¿Cómo estas?</span><br>
											<span class="fs-xs">Muy bien y tu que tal</span>-->
										</td>
										<td class="text-center">
											<button type="button" class="btn-social bs-warning bs-outline bs-sm">
												<i class="ai-edit"></i> 
											</button>
											<button type="button" class="btn-social bs-danger bs-outline bs-sm">
												<i class="ai-trash-2"></i> 
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="admin-modulo" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title-modal-admin-modulo">Acciones modulos</h5>
				</div>
				<div class="modal-body">
					<input type="hidden" name="actionModulo" id="actionModulo" class="form-control form-control-sm">
					<input type="hidden" name="idModulo" id="idModulo" class="form-control form-control-sm">
					<div class="row mb-2 mt-2" id="get-datos-accion-modulo"></div>
					<div class="mt-4 text-center">
						<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">Cancelar</button>
						<button type="button" class="btn btn-sm btn-outline-success" id="btn-confirmacion-admin-modulo">Aceptar</button>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="admin-sesion" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title-modal-admin-modulo">Acciones sesiones</h5>
				</div>
				<div class="modal-body">
					<input type="hidden" name="actionSesion" id="actionSesion" class="form-control form-control-sm">
					<input type="hidden" name="idSesionModulo" id="idSesionModulo" class="form-control form-control-sm">
					<div class="row mb-2 mt-2" id="get-datos-accion-sesion"></div>					
					<div class="mt-4 text-center">
						<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">Cancelar</button>
						<button type="button" class="btn btn-sm btn-outline-success" id="btn-confirmacion-admin-sesion">Aceptar</button>
					</div>

				</div>
			</div>
		</div>
	</div>






</form>

<div id="result-admin-modulo"></div>
<div id="result-admin-sesion"></div>


<script type="text/javascript">

	$(function() {
		$("i[id=editInfo]").click(function() {
			showHideElementsData(this, true, null);
		});
		$("i[id=noEditInfo]").click(function() {
			showHideElementsData(this, false, null);
		});
		$("button[id=btn-acciones-seccion]").click(function() {
			validarCamposSeccion(this);
		});

		
		$("#btn-confirmacion-admin-modulo").click(function() {
			validaCamposAccionModulo();
		});

		$("#btn-confirmacion-admin-sesion").click(function() {
			validaCamposAccionSesion();
		});


		setAccionesElementosInicio('<?=$datosGeneralesCurso["edit"]?>', "datGralCurso");
		setAccionesElementosInicio('<?=$datosImagenCurso["edit"]?>', "datImgCurso");
		setAccionesElementosInicio('<?=$datosCostosCurso["edit"]?>', "datCostCurso");
		getModulosCurso();
	});



	function recargaDatos() {
		switch($("#banderaAccionDatosCurso").val()){
			case 'TRUE-MODULO':
				getModulosCurso();
				$("#admin-modulo").modal("hide");
			break;
			case 'TRUE-SESION':
				getModulosCurso();
				getSesionesModulos();
				$("#admin-sesion").modal("hide");
			break;
		}
	}

	function getModulosCurso() {
		Accion_JQuery("setInformacionCurso", "Administracion-GetModulosCurso", "get-modulos-cursos", "Cargando Información", "Listando los módulos del curso", 0);
	}

	function getSesionesModulos() {
		Accion_JQuery("setInformacionCurso", "Administracion-GetSesionModulo", "get-sesiones-modulos", "Cargando información", "Estamos buscando información de las sesiónes correspondientes al módulo seleccionado.", 0);
	}

	function validaCamposAccionModulo() {

		var actionMessage = "";
		switch($("#actionModulo").val()) {
			case 'ADD':
				actionMessage = "guardar";
			break;
			case 'EDIT':
				actionMessage = "modificar";
			break;
		}

		if($("#nombreModulo").val().length >= 1) {
			getMensajeGeneral("success","Esta a punto de " + actionMessage + " información de la sección <strong>Módulos</strong>","¿Está seguro?","SetDatosModuloCurso");
		} else {
			showNotification("!Alerta¡", "El campo <strong>Nombre del módulo</strong> esta vacio. Favor de llenar el campo.", "warning");
		}
	}

	function successSetDatosModuloCurso(argument) {
		Accion_JQuery("setInformacionCurso", "Administracion-SetAccionModuloCurso", "result-admin-modulo", "Realizando acciones", "Guardando información de los módulos", 1);
	}

	function GetAccionModulosCurso(elemento) {
		var titleModal = "";
		var textBtnCofirma = "";

		$("#actionModulo").val($(elemento).attr("action-element"));
		$("#idModulo").val($(elemento).attr("value-element"));

		switch($(elemento).attr("action-element")) {
			case 'LINK':
				//Accion_JQuery("setInformacionCurso", "Administracion-GetSesionModulo", "get-sesiones-modulos", "Cargando información", "Estamos buscando información de las sesiónes correspondientes al módulo seleccionado.", 0);
				getSesionesModulos()
			break;
			case 'DELETE':
				alert("se elimina");
			break;
			default:
				switch($(elemento).attr("action-element")) {
					case 'ADD':
						titleModal = "Agregar un nuevo módulo";
						textBtnCofirma = "Agregar";
					break;
					case 'EDIT':
						titleModal = "Modificar datos del módulo";
						textBtnCofirma = "Modificar";
					break;
				}

				$("#title-modal-admin-modulo").html(titleModal);
				$("#btn-confirmacion-admin-modulo").html(textBtnCofirma);

				Accion_JQuery("setInformacionCurso", "Administracion-GetAccionModuloCurso", "get-datos-accion-modulo", "Cargando información", "Estamos preparando los elementos necesarios para la administración de módulo", 0);

				$("#admin-modulo").modal("show");
			break;
		}
	}

	function validaCamposAccionSesion() {

		var actionMessage = "";
		switch($("#actionSesion").val()) {
			case 'ADD':
				actionMessage = "guardar";
			break;
			case 'EDIT':
				actionMessage = "modificar";
			break;
		}

		if($("#nombreSesion").val().length >= 1) {
			if($("#duracionSesion").val().length >= 1) {
				
				if($("#actionSesion").val() === "ADD") {
					if($("#materialSesion").val().length >= 1) {
						getMensajeGeneral("success","Esta a punto de " + actionMessage + " información de la sección <strong>Sesiones</strong> del modulo seleccionado","¿Está seguro?","SetDatosSesionModulo");
					} else {
						showNotification("!Alerta¡", "El campo <strong>Material de apoyo</strong> esta vacio. Favor seleccionar un archivo.", "warning");
					}
				} else {
					if($("#changeMaterial").is(":checked")) {
						if($("#materialSesion").val().length >= 1) {
							getMensajeGeneral("success","Esta a punto de " + actionMessage + " información de la sección <strong>Sesiones</strong> del modulo seleccionado","¿Está seguro?","SetDatosSesionModulo");
						} else {
							showNotification("!Alerta¡", "El campo <strong>Material de apoyo</strong> esta vacio. Favor seleccionar un archivo.", "warning");
						}
					} else {
						getMensajeGeneral("success","Esta a punto de " + actionMessage + " información de la sección <strong>Sesiones</strong> del modulo seleccionado","¿Está seguro?","SetDatosSesionModulo");
					}
				}
			} else {
				showNotification("!Alerta¡", "El campo <strong>Duración de la sesión</strong> esta vacio. Favor de llenar el campo.", "warning");
			}
		} else {
			showNotification("!Alerta¡", "El campo <strong>Nombre de la sesión</strong> esta vacio. Favor de llenar el campo.", "warning");
		}
	}

	function successSetDatosSesionModulo() {
		Accion_JQuery("setInformacionCurso", "Administracion-SetAccionSesionModulo", "result-admin-sesion", "Realizando acciones", "Guardando información de las sesiones del modulo seleccionado", 1);
	}

	function GetAccionSesionesCurso(elemento) {
		var titleModal = "";
		var textBtnCofirma = "";

		$("#actionSesion").val($(elemento).attr("action-element"));
		$("#idSesionModulo").val($(elemento).attr("value-element"));

		switch($(elemento).attr("action-element")) {
			case 'DELETE':
				alert("se elimina");
			break;
			default:
				switch($(elemento).attr("action-element")) {
					case 'ADD':
						titleModal = "Agregar una nueva sesión";
						textBtnCofirma = "Agregar";
					break;
					case 'EDIT':
						titleModal = "Modificar datos de la sesión";
						textBtnCofirma = "Modificar";
					break;
				}

				$("#title-modal-admin-sesion").html(titleModal);
				$("#btn-confirmacion-admin-sesion").html(textBtnCofirma);

				Accion_JQuery("setInformacionCurso", "Administracion-GetAccionSesionModulo", "get-datos-accion-sesion", "Cargando información", "Estamos preparando los elementos necesarios para la administración de sesión", 0);

				$("#admin-sesion").modal("show");
			break;
		}
	}

	function validaDatosGeneralesDelCurso(valueNombreApartado) {
		var bandera = false;

		if($("#nombreCurso").val().length >= 1){
			if($("#descripGeneralCurso").val().length >= 1){
				if($("#descripEspecificaCurso").val().length >= 1){
					if($("input[name=idNivelCurso]").is(":checked") === true){
						bandera = true;
					} else {
						showNotification("!Alerta¡", "El campo <strong>Nivel</strong> de la sección <strong>" + valueNombreApartado + "</strong> esta vacio. Favor de seleccionar una opción.", "warning");
					}
				} else {
					showNotification("!Alerta¡", "El campo <strong>Descripción Especifica</strong> de la sección <strong>" + valueNombreApartado + "</strong> esta vacio. Favor de llenar el campo.", "warning");
				}
			} else {
				showNotification("!Alerta¡", "El campo <strong>Descripción general</strong> de la sección <strong>" + valueNombreApartado + "</strong> esta vacio. Favor de llenar el campo.", "warning");
			}
		} else {
			showNotification("!Alerta¡", "El campo <strong>Nombre</strong> de la sección <strong>" + valueNombreApartado + "</strong> esta vacio. Favor de llenar el campo.", "warning");
		}

		return bandera;
	}

	function successSetDatGralCurso() {
		showEsperando("Guardando información", "Estamos guardando los datos generales del curso");
		$("#setInformacionCurso").submit();
	}

	function validaDatosImageDelCurso(valueNombreApartado) {
		var bandera = false;

		if($("#imagenCurso").val().length >= 1){
			bandera = true;
		} else {
			showNotification("!Alerta¡", "El campo <strong>Imágen</strong> de la sección <strong>" + valueNombreApartado + "</strong> esta vacio. Favor de seleccionar un archivo.", "warning");
		}

		return bandera;
	}

	function successSetDatImgCurso() {
		showEsperando("Guardando información", "Estamos guardando la imágen del curso");
		$("#setInformacionCurso").submit();
	}

	function validaDatosCostosDelCurso(valueNombreApartado) {
		var bandera = false;
		if($("#idDivisa").val() !== "NULL"){
			if($("#precioActual").val().length >= 1){
				bandera = true;
			} else {
				showNotification("!Alerta¡", "El campo <strong>Precio actual</strong> de la sección <strong>" + valueNombreApartado + "</strong> esta vacio. Favor de llenar el campo.", "warning");
			}
		} else {
			showNotification("!Alerta¡", "El campo <strong>Divisa</strong> de la sección <strong>" + valueNombreApartado + "</strong> esta vacio. Favor de seleccionar una opción.", "warning");
		}


		return bandera;
	}

	function successSetDatCostCurso() {
		showEsperando("Guardando información", "Estamos guardando la información de los costos del curso");
		$("#setInformacionCurso").submit();
	}


	function validarCamposSeccion(elemento) {
		var fomularioCorrecto;
		var actionSeccion = "INSERT";
		var actionMensajeSeccion = "guardar";
		
		switch($(elemento).attr("value-element")) {
			case 'datGralCurso':
				fomularioCorrecto = validaDatosGeneralesDelCurso($(elemento).attr("value-nombre-apartado"));
			break;
			case 'datImgCurso':
				fomularioCorrecto = validaDatosImageDelCurso($(elemento).attr("value-nombre-apartado"));
			break;
			case 'datCostCurso':
				fomularioCorrecto = validaDatosCostosDelCurso($(elemento).attr("value-nombre-apartado"));
			break;
			default:
				alert("Falta hacer la validación para el apartado [" + $(elemento).attr("value-nombre-apartado") + "]");
			break;
		}

		if($(elemento).attr("value-action") === "true") {
			actionSeccion = "EDIT";
			actionMensajeSeccion = "modificar";
		}

		if(fomularioCorrecto === true) {
			$("#actionSeccion").val(actionSeccion);
			$("#seccionAccionada").val($(elemento).attr("value-element"));
			getMensajeGeneral("success","Esta a punto de " + actionMensajeSeccion + " información de la sección <strong>" + $(elemento).attr("value-nombre-apartado") + "</strong>","¿Está seguro?","Set" + primeraMayuscula($(elemento).attr("value-element")));
		} else {
			//$("#VPro_CapturaDictamen\\:xmlInformacion").val(xml);
		}
	}

	function getMensajeGeneral(tipo,titulo,subtitulo,modulo){
		$("#btn-confirmacion-" + tipo).attr("onclick", tipo + modulo + "()");
		$("#texto-modal-" + tipo).html(titulo + "<br>" + subtitulo);
		$("#modal-confirmacion-" + tipo).modal("show");
	}

	function primeraMayuscula(texto) {
		return texto.charAt(0).toUpperCase() + texto.slice(1); 
	}



	function setAccionesElementosInicio(editarDatos, seccion) {

		var edit = true
		if(editarDatos === "true") {
			edit = false;
		}
		showHideElementsData(null, edit, seccion);
	}

	function showHideElementsData(elemento, show, elementoDirecto) {
		var valueElement = "";

		if(elementoDirecto === null) {
			valueElement = $(elemento).attr("value-element");
		} else {
			valueElement = elementoDirecto;
		}
		
		if(show === true) {
			$("i[id=editInfo][value-element=" + valueElement + "]").hide();
			$("i[id=noEditInfo][value-element=" + valueElement + "]").show();
			$("[id=label-" + valueElement + "]").hide();
			$("[alt=data-" + valueElement + "]").show();
			$("button[id=btn-acciones-seccion][value-element=" + valueElement + "]").show();
		} else {
			$("i[id=editInfo][value-element=" + valueElement + "]").show();
			$("i[id=noEditInfo][value-element=" + valueElement + "]").hide();
			$("[id=label-" + valueElement + "]").show();
			$("[alt=data-" + valueElement + "]").hide();
			$("button[id=btn-acciones-seccion][value-element=" + valueElement + "]").hide();
		}
	}
</script>