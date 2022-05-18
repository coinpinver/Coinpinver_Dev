
<div class="col-12">
	<div class="row align-items-center">
		<label class="col-sm-12 col-md-3 col-lg-3 col-form-label fs-xs" for="nombreCurso">Nombre de la sesion:</label>
		<div class="col-sm-12 col-md-9 col-lg-9">
			<input type="text" name="nombreSesion" id="nombreSesion" value="<?=$informacion["datosSesionCurso"]["nombreSesion"]?>" class="form-control form-control-sm" placeholder="Escribe el nombre de la sesión" autocomplete="off" maxlength="255">
		</div>
	</div>
	<div class="row align-items-center">
		<label class="col-sm-12 col-md-3 col-lg-3 col-form-label fs-xs" for="nombreCurso">Material de apoyo:</label>
		<div class="col-sm-12 col-md-9 col-lg-9">
			<?php $ocultoFile = ""; if($informacion["actionSesion"] == "EDIT") { $ocultoFile = "oculto"; ?>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="changeMaterial" id="changeMaterial" value="1" />
					<label class="form-check-label" for="changeMaterial">Cambiar el material</label>
				</div>
			<?php } ?>
			<input type="file" name="materialSesion" id="materialSesion" class="form-control form-control-sm <?=$ocultoFile?>" accept="video/mp4,video/x-m4v,video/*">
		</div>
	</div>
	<div class="row align-items-center">
		<label class="col-sm-12 col-md-3 col-lg-3 col-form-label fs-xs" for="nombreCurso">Duración de la sesion:</label>
		<div class="col-sm-12 col-md-9 col-lg-9">
			<input type="text" name="duracionSesion" id="duracionSesion" data-format="time" value="<?=$informacion["datosSesionCurso"]["duracionSesion"]?>" class="form-control form-control-sm" placeholder="hh:mm:ss" autocomplete="off" maxlength="150">
		</div>
	</div>
</div>

<input type="hidden" name="hashSesion" id="hashSesion" value="<?=$informacion["datosSesionCurso"]["hashSesion"]?>" class="form-control form-control-sm">

<script type="text/javascript">
	$(function() {


		flatpickr("#nuegosh", {enableTime: true, noCalendar: true, dateFormat: "H:i:S",});

		$("#changeMaterial").click(function() {
			showFileMaterial();
		});
	});

	function showFileMaterial() {
		$("#materialSesion").hide();

		if($("#changeMaterial").is(":checked")) {
			$("#materialSesion").show();
		}
	}

</script>

<script src="<?=base_url("js/theme.min.js")?>?t=<?=time()?>"></script>
