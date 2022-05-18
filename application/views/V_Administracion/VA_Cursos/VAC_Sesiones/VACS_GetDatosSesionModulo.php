

<span class=" h5 card-title text-center mb-3">Sesiones del módulo</span>
<p class="fs-md"><?=$informacion["nombreModulo"]?></p>

<button type="button" class="btn btn-outline-dark btn-translucent-dark btn-sm mb-3" id="addSesion" action-element="ADD" value-element="000">
	<i class="ai-plus-square"></i> Agregar una sesión
</button>
<div class="table-responsive">
	<table class="table table-sm table-bordered1">
		<thead>
			<tr>
				<th class="text-center fs-sm" width="5%">#</th>
				<th class="text-center fs-sm" width="61%">Nombre</th>
				<th class="text-center fs-sm" width="10%">Duración</th>
				<th class="text-center fs-sm" width="12%">Material</th>
				<th class="text-center" width="12%"></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$x = 1;
				foreach($informacion["datosSesionModulo"] as $datosSesionModulo) {
					echo "<tr>";
						echo "<td class='text-center fs-sm'>" . $x . "</td>";
						echo "<td class='text-justify fs-sm'>" . $datosSesionModulo->nombreSesion . "</td>";
						echo "<td class='text-justify fs-sm'>" . $datosSesionModulo->duracionSesion . "</td>";
						echo "<td class='text-center'>";
							echo "<button type='button' class='btn-social bs-youtube bs-round bs-outline bs-lg'>";
								echo "<i class='ai-youtube'></i>";
							echo "</button>";
						echo "</td>";
						echo "<td class='text-center'>";
							echo "<button type='button' class='btn-social bs-warning bs-outline bs-sm' id='editDeleteSesion' action-element='EDIT' value-element='" . $datosSesionModulo->idSesionModulo . "'>";
								echo "<i class='ai-edit'></i> ";
							echo "</button>";
							echo "<button type='button' class='btn-social bs-danger bs-outline bs-sm' id='editDeleteSesion' action-element='DELETE' value-element='" . $datosSesionModulo->idSesionModulo . "'>";
								echo "<i class='ai-trash-2'></i> ";
							echo "</button>";
						echo "</td>";
					echo "</tr>";
					$x++;
				}
			?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	$(function() {
		$("#addSesion").click(function() {
			GetAccionSesionesCurso(this);
		});
		$("button[id=editDeleteSesion]").click(function() {
			GetAccionSesionesCurso(this);
		});
	});
</script>

