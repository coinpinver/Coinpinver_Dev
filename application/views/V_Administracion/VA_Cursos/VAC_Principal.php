
<style type="text/css">
	.bg-administracion {
		background-image: url("../img/coinpinver/Administracion/backgroundTitle.jpg");
	}
</style>

<div class="bg-size-cover overflow-hidden pt-5 pb-5 bg-administracion">
	<div class="container position-relative zindex-5">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-8 text-center">
				<h1 class="display-4 text-light">Administración de Cursos</h1>
			</div>
		</div>
	</div>
</div>

<form id="adminCursoPrincipal" name="adminCursoPrincipal" method="POST">
	<div class="container-fluid mt-4 mb-4">
		<div class="row">
			
			<div class="col-sm-12 col-md-7 col-lg-7 mb-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title text-center">Listado de Cursos</h5>

						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Nombre</th>
										<th class="text-center">Descripción</th>
										<th class="text-center">Fecha de captura</th>
										<th class="text-center">Fecha de publicación</th>
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>
									<!--<tr>
									<th scope="row">1</th>
									<td>John</td>
									<td>Doe</td>
									<td>CEO, Founder</td>
									<td>+3 555 68 70</td>
									</tr>-->
								</tbody>
							</table>
						</div>


					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-5 col-lg-5 mb-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title text-center">Captura de nuevo curso</h5>

						<div class="mb-3">
							<label for="nombreCurso" class="form-label">Nombre: *</label>
							<input type="text" id="nombreCurso" name="nombreCurso" class="form-control form-control-sm" title="Nombre">
						</div>

						<div class="mb-3">
							<label for="text-input" class="form-label">Nivel del curso: *</label>
							<div class="form-check">

								<?php
								foreach($informacion["datosCatNivelCurso"] as $datosCatNivelCurso) {
									echo "<div class='form-check form-check-inline'>";
										echo "<input type='radio' id='nivel-" . $datosCatNivelCurso->idNivelCurso . "' name='idNivelCurso' value='" . $datosCatNivelCurso->idNivelCurso . "' class='form-check-input' title='Nivel del curso'>";
										echo "<label class='form-check-label' for='nivel-" . $datosCatNivelCurso->idNivelCurso . "'>" . $datosCatNivelCurso->descripNivelCurso . "</label>";
									echo "</div>";
								}
								?>
							</div>
						</div>

						<button type="button" id="btn-adminCursoPrincipal" class="btn btn-outline-primary btn-translucent-primary btn-sm btn-icon d-block w-100">
							<i class="ai-save"></i> Guardar
						</button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</form>

<div id="result-adminCursoPrincipal"></div>

<script type="text/javascript">
	$(function() {
		$("#btn-adminCursoPrincipal").click(function() {
			validaFormCapturaNuevoCurso();
		});
	});

	function validaFormCapturaNuevoCurso() {
		if($("#nombreCurso").val().length >= 1) {
			if($("input[name=idNivelCurso]").is(":checked") === true) {
				Accion_JQuery("adminCursoPrincipal", "Administracion-SetCurso", "result-adminCursoPrincipal", "Guardando datos generales del curso", "Al culminar se rediceccionará a la administración total", 1);
			} else {
				showNotification("!Alerta¡", "La opción <strong>" + $("input[name=idNivelCurso]").attr("title") + "</strong> esta vacia. Favor de seleccionar una opción", "warning");
			}
		} else {
			showNotification("!Alerta¡", "El campo <strong>" + $("#nombreCurso").attr("title") + "</strong> esta vacio. Favor de llenarlo", "warning");
		}
	}

	function recargaDatos() {
		if(typeof($("#hashCurso").val()) !== "undefined") {
			if($("#hashCurso").val().length >= 1) {
				window.location.replace(base_url + "index.php/Administracion-GetCurso/" + $("#hashCurso").val() + "/f1a6-1e1e50-0z");
			}
		}
	}
</script>

