

<button type="button" class="btn btn-outline-dark btn-translucent-dark btn-sm mb-3" id="addModulo" action-element="ADD" value-element="000">
	<i class="ai-plus-square"></i> Agregar un modulo
</button>
<div class="table-responsive">
	<table class="table table-sm">
		<thead>
			<tr>
				<th class="text-center fs-sm" width="5%">#</th>
				<th class="text-center fs-sm" width="55%">Nombre</th>
				<th class="text-center fs-sm" width="15%">Sesiones</th>
				<th class="text-center" width="25%"></th>
			</tr>
		</thead>
		<tbody>
			<?php

			if(count($informacion["datosModuloCurso"]) >= 1) {

				$x = 1;
				foreach ($informacion["datosModuloCurso"] as $datosModuloCurso) {
					echo "<tr>";
						echo "<td class='text-center fs-sm'>" . $x . "</td>";
						echo "<td class='text-justify fs-sm'>" . $datosModuloCurso->nombreModulo . "</td>";
						echo "<td class='text-center fs-sm'>" . $datosModuloCurso->numeroSesiones . "</td>";
						echo "<td class='text-center'>";
							echo "<button type='button' class='btn-social bs-info bs-outline bs-sm' id='editLinkDeleteModulo' action-element='LINK' value-element='" . $datosModuloCurso->idModulo . "'>";
								echo "<i class='ai-folder'></i>";
							echo "</button>";
							echo "<button type='button' class='btn-social bs-warning bs-outline bs-sm' id='editLinkDeleteModulo' action-element='EDIT' value-element='" . $datosModuloCurso->idModulo . "'>";
								echo "<i class='ai-edit'></i> ";
							echo "</button>";
							echo "<button type='button' class='btn-social bs-danger bs-outline bs-sm' id='editLinkDeleteModulo' action-element='DELETE' value-element='" . $datosModuloCurso->idModulo . "'>";
								echo "<i class='ai-trash-2'></i> ";
							echo "</button>";
						echo "</td>";
					echo "</tr>";
					$x++;
				}
			} else {
				echo "<tr>";
					echo "<td colspan='4'>";
						echo "<div class='alert alert-primary' role='alert'>";
							echo "No se encuentra ningun módulo para éste curso. Da clic en el botón <strong>Agregar un modulo</strong> para iniciar la captura.";
						echo "</div>";
					echo "</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	$(function() {
		$("#addModulo").click(function() {
			GetAccionModulosCurso(this);
		});
		$("button[id=editLinkDeleteModulo]").click(function() {
			GetAccionModulosCurso(this);
		});
	});
</script>

