<?php 
$titulo = $informacion["titulo"];
$r_usureg = $informacion["r_usureg"];
$r_usuregPais= $informacion["r_usuregPais"];
?>

<style>

.ct-chart {
    margin: auto;
    width: 300px;
    height: 300px;
}
#listadoUsuarios
{
	height: 600px;
	overflow: auto;
}
</style>
<div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-start">
	<h1 class="h3 mb-2 text-nowrap"><?=$titulo;?></h1>
</div>

<div class="row">
	<div class="col-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Total de usuarios</th>
						<th>Coinpinver</th>
						<th>E-learning</th>
						<th>Ambas plataformas</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center"><span class="badge rounded-pill bg-success resulTotal"></span></td>
						<td class="text-center"><span class="badge rounded-pill bg-warning resulCoin"></span></td>
						<td class="text-center"><span class="badge rounded-pill bg-primary resulElear"></span></td>
						<td class="text-center"><span class="badge rounded-pill bg-info resulAmbas"></span></td>
					</tr>
				</tbody>
			</table>
		</div>


		<div class="ct-chart ct-perfect-fourth" id="chart1"></div>		
	</div>
	<div class="col-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th colspan="3" class="text-center">Lugares de mayor registro</th>
					</tr>
					
				</thead>
				<tbody>
					<tr>
						<td class="text-center">
							<?=$r_usuregPais[0]->descripPais;?>
						</td>
						<td class="text-center">
							<?=$r_usuregPais[1]->descripPais;?>
						</td>
						<td class="text-center">
							<?=$r_usuregPais[2]->descripPais;?>
						</td>
					</tr>
					<tr>
						<td class="text-center">
							<span class="badge rounded-pill bg-info lugarRegistro1"><?=$r_usuregPais[0]->cuantosPais;?></span>
						</td>
						<td class="text-center">
							<span class="badge rounded-pill bg-info lugarRegistro2"><?=$r_usuregPais[1]->cuantosPais;?></span>
						</td>
						<td class="text-center">
							<span class="badge rounded-pill bg-info lugarRegistro3"><?=$r_usuregPais[2]->cuantosPais;?></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>		
	</div>
</div>

<hr>
<div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-start">
	<h1 class="h3 mb-2 text-nowrap">Listado de usuarios registrados</h1>
</div>
<div id="listadoUsuarios">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Fecha de registro</th>
					<th colspan="2" class="text-center">Plataformas</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$fila = "";
				$con = 1;
				$arrayCoin = "";
				$arrayEle = "";
				$totalUsuarioRegistrados = 0;
				$CuantosambasPlataformas = 0;
				$CuantosCoinpinver = 0;
				$CuantosElearning = 0;
				foreach ($r_usureg as $pos => $val) {
					$prox = $pos+1;

					@$nomProx = $r_usureg[$prox]->nombreUsuario;
					@$idDatosUsuarioProx = $r_usureg[$prox]->idDatosUsuario;
					//@$descripPlataformaProx = $r_usureg[$prox]->descripPlataforma;
					
					$idDatosUsuario = $val->idDatosUsuario;
					$nombre = $val->nombreUsuario;
					$app = $val->apPatUsuario;
					$apm = $val->apMatUsuario;
					$nomCompleto = $nombre." ".$app." ".$apm;
					$correo = $val->emailUsuario;
					

					//$descripPlataforma = $val->descripPlataforma;
					$fechaAltaCuenta = $val->fechaAltaCuenta;
					echo "<tr>";
					if($idDatosUsuario != $idDatosUsuarioProx)
					{
						foreach ($r_usureg as $val2)
						{
							$idDatosUsuario2 = $val2->idDatosUsuario; 
							$descripPlataforma = $val2->descripPlataforma;
							//$descripPlataformaProx = $val2->descripPlataformaProx;
							if($idDatosUsuario == $idDatosUsuario2)
							{						
								$arrayEle.= $descripPlataforma.",";	
							}		
						}
						$cuantos = strlen($arrayEle);
						switch ($cuantos) {
							case 22:
								$CuantosambasPlataformas++;
								break;
							default:
								
								break;
						}
						switch ($arrayEle) {
							case 'Coinpinver,':
								$CuantosCoinpinver++;
								break;
							case 'E-learning,':
								$CuantosElearning++;
								break;
							default:
								// code...
								break;
						}
						
						$arrayEle = substr($arrayEle, 0, -1);
						$arrayEle = explode(",",$arrayEle);
						echo "<td>".$con."</td>";
						echo "<td>".$nomCompleto."</td>";
						echo "<td>".$correo."</td>";
						echo "<td>".$fechaAltaCuenta."</td>";
						echo "<td>".$arrayEle[0]."</td>";
						echo "<td>".@$arrayEle[1]."</td>";
						
						
						$arrayEle = "";
						$con++;
						$totalUsuarioRegistrados++;
					}
					echo "</tr>";
					
					
				}
				$valoresGrafica = $CuantosCoinpinver.",".$CuantosElearning.",".$CuantosambasPlataformas;
				?>
			</tbody>
		</table>
	</div>
</div>


<script>
	$(function()
	{
		$(".resulTotal").text(<?=$totalUsuarioRegistrados;?>);
		$(".resulCoin").text(<?=$CuantosCoinpinver;?>);
		$(".resulElear").text(<?=$CuantosElearning;?>);
		$(".resulAmbas").text(<?=$CuantosambasPlataformas;?>);
	});

	var data = {
	  labels: ["Coinpinver: "+<?=$CuantosCoinpinver;?>, "E-learning: "+<?=$CuantosElearning;?>, "Ambas: "+<?=$CuantosambasPlataformas;?>],
	  series: [<?=$valoresGrafica;?>],
	  colors: ["blue", "red", "yellow"]
	};

	var responsiveOptions = [
	  ['screen and (min-width: 640px)', {
	    chartPadding: 30,
	    labelOffset: 100,
	    labelDirection: 'explode',
	    labelInterpolationFnc: function(value) {
	      return value;
	    }
	  }],
	  ['screen and (min-width: 1024px)', {
	    labelOffset: 80,
	    chartPadding: 20
	  }]
	];

	new Chartist.Pie('.ct-chart', data, responsiveOptions);

</script>