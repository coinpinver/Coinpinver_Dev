<?php 
$r_datPer = $informacion['r_datPer'];
$idUsuario = $r_datPer[0]->idDatosUsuario;
$nombreUsuario = $r_datPer[0]->nombreUsuario;
$paternoUsuario = $r_datPer[0]->apPatUsuario;
$maternoUsuario = $r_datPer[0]->apMatUsuario;
$aliasUsuario = $r_datPer[0]->userControlUsuario;
$emailUsuario = $r_datPer[0]->emailUsuario;

$idSexo = $informacion["idSexo"];
$descripSexo = $informacion["descripSexo"];

$idPais = $informacion["idPais"];
$descripPais = $informacion["descripPais"];
$fechaNacimientoUsuario = $informacion["fechaNacimientoUsuario"];

if($fechaNacimientoUsuario == '0000-00-00')
{
	$fechaNacimientoUsuario="";
}
$LabelProgreso = "Porcentaje para completar tú perfil";
$total = 9;
if(empty($nombreUsuario) || empty($paternoUsuario) || empty($maternoUsuario) || empty($descripSexo) || empty($descripPais) || empty($fechaNacimientoUsuario))
{
	$cantidad = 2;
}
else
{
	$cantidad = 9;
}

$porcentaje = (100 * $cantidad) / $total; // Regla de tres
$porcentaje = round($porcentaje, 0);  // Quitar los decimales

$fotoUsuario = $r_datPer[0]->fotoUsuario;

if($fotoUsuario == "")
{
	$imagenFoto = base_url("img/coinpinver/Usuario/Avatar.png");
	
}
else
{
	
	$imagenFoto = 'data:image/jpeg;base64,'.base64_encode($fotoUsuario);
}

$arrayMenuPerfil = $informacion["arrayMenuPerfil"];

?>
<div class="container position-relative zindex-5 pb-5 mb-md-3">
	<div class="row">
		<!-- Sidebar-->

		<div class="col-lg-4 mb-4 mb-lg-0">
			<div class="bg-light rounded-3 shadow-lg">
				<div class="px-4 py-4 mb-1 text-center">
					<img class="d-block img-thumbnail mx-auto my-2" src="<?=$imagenFoto;?>" at="<?=$aliasUsuario;?>" width="110">
					<h6 class="mb-0 pt-1"><?=$nombreUsuario;?></h6><span class="text-muted fs-sm"><?=$aliasUsuario;?></span>
				</div>
				<div class="d-lg-none px-4 pb-4 text-center"><a class="btn btn-primary px-5 mb-2" href="#account-menu" data-bs-toggle="collapse"><i class="ai-menu me-2"></i>Menú</a></div>
				<div class="d-lg-block collapse pb-2" id="account-menu">
					<h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3">Configuraciones de la cuenta</h3>
					<?php 

						foreach ($arrayMenuPerfil as $key => $val) {
							$menu = $val["menu"];
							$route = $val["route"];
							$icono = $val["icono"];
							if($route != "#")
							{
								$route = 'value-route="'.$route.'"';
							}
							else
							{
								$route = 'href="'.$route.'"';
							}
							echo '
								<a class="d-flex align-items-center nav-link-style px-4 py-3 border-top cursor textoMenuPerfil" id="menu" '.$route.'>
								<i class="'.$icono.' fs-lg opacity-60 me-2 textoMenuPerfil"></i>
								'.$menu.'</a>
							';
						}
					?>

					
					<a class="d-flex align-items-center nav-link-style px-4 py-3 border-top textoMenuPerfil" href="<?=base_url("index.php/CerrarSesion");?>"><i class="ai-log-out fs-lg opacity-60 me-2 textoMenuPerfil"></i>Cerrar sesión</a>
				</div>
			</div>
		</div>
		<!-- Content-->
		<div class="col-lg-8">
			<div class="d-flex flex-column h-100 bg-light rounded-3 shadow-lg p-4">
				<div class="py-2 p-md-3" id="contenidoMenu">
					<div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-start">
						<h1 class="h3 mb-2 text-nowrap">Información de perfil</h1>
						<!-- <a class="btn btn-link text-danger fw-medium btn-sm mb-2" href="#">
							<i class="ai-trash-2 fs-base me-2"></i>Eliminar cuenta
						</a> -->
					</div>
					<!-- Content-->
					<form name="setPerfilUsuario" id="setPerfilUsuario" method="POST" action="<?=base_url("index.php/setPerfilUsuario")?>" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="bg-secondary rounded-3 p-4 mb-4">
						<div class="d-block d-sm-flex align-items-center">
							
							<img class="d-block img-thumbnail mx-sm-0 mx-auto mb-3 mb-sm-0" src="<?=$imagenFoto;?>" alt="<=?$aliasUsuario;?>" width="110">	
							<div class="ps-sm-3 text-center text-sm-start">
								<div class="file-drop-area">
								  <div class="file-drop-icon ai-upload"></div>
								  <span class="file-drop-message">Cambiar de avatar</span>
								  <input type="file" accept="image/png, image/jpg, image/jpeg" class="file-drop-input" id="fotoUsuario" name="fotoUsuario" required="true">
								  <button type="button" class="file-drop-btn btn btn-translucent-primary btn-sm">Subir JPG, PNG. 300 x 300 </button>
								</div>
								<!-- <button class="btn btn-light shadow btn-sm mb-2" type="button"><i class="ai-refresh-cw me-2"></i>Cambiar avatar</button>
								<div class="p mb-0 fs-ms text-muted">Subir JPG, GIF or PNG image. 300 x 300 required.</div> -->
							</div>
						</div>

					</div>
					
						<div class="row">
							
							<div class="col-sm-4">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="username">Nombre *</label>
									<input class="form-control" type="text" name="username" id="username" value="<?=$nombreUsuario;?>" required="true">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="paternoUsuario">Apellido paterno *</label>
									<input class="form-control" type="text" id="paternoUsuario" name="paternoUsuario" value="<?=$paternoUsuario;?>" required="true">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="maternoUsuario">Apellido materno *</label>
									<input class="form-control" type="text" id="maternoUsuario" name="maternoUsuario" value="<?=$maternoUsuario;?>" required="true">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="vup_email">Correo electrónico</label>
									<input class="form-control" type="text" id="vup_email" name="vup_email" value="<?=$emailUsuario;?>" placeholder="ejemplo@example.com" readonly>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="vup_usuario">Usuario</label>
									<div class="input-group"><span class="input-group-text">@</span>
										<input class="form-control" type="text" id="vup_usuario" name="vup_usuario" value="<?=$aliasUsuario;?>" readonly>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="fechaNacimientoUsuario">Fecha de nacimiento *</label>
									<div class="input-group mb-3">
										<i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
									  	<input class="form-control rounded date-picker pe-5" type="text" id="fechaNacimientoUsuario" name="fechaNacimientoUsuario" data-datepicker-options='{"altInput": false, "altFormat": "F j, Y", "dateFormat": "Y-m-d"}' placeholder="yyyy-mm-dd" value="<?=$fechaNacimientoUsuario;?>" required="true">
									</div>	
								</div>


							</div>
							<div class="col-sm-4">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="idPais">Pais *</label>
									<select class="form-select" id="idPais" name="idPais" required="true">
										<?php 
										if($descripPais == "")
										{
											//condición para cuando vaya ser la primera vez, mostra sin datos
											echo '<option value="">Selecciona...</option>';
											
										}
										else
										{
											//de lo contrario ya trae dato
											echo '<option value="'.$idPais.'">'.$descripPais.'</option>';
										}
										$pais = $informacion["pais"];
								  		foreach ($pais as $p) {
								  			$idPaisBD = $p->idPais;
								  			$descripPais = $p->descripPais;
								  			if($idPaisBD != $idPais)
								  			{
								  				echo '<option value="'.$idPaisBD.'">'.$descripPais.'</option>';	
								  			}
								  			
								  		}
										?>
										
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mb-3 pb-1">
									<label class="form-label px-0" for="idSexo">Sexo *</label>
									<select class="form-select" id="idSexo" name="idSexo">
								  		<?php 
									  		if($descripSexo == "")
											{
												//condición para cuando vaya ser la primera vez, mostra sin datos
												echo '<option value="">Selecciona...</option>';
												
											}
											else
											{
												//de lo contrario ya trae dato
												echo '<option value="'.$idSexo.'">'.$descripSexo.'</option>';
											}
											
									  		$sexo = $informacion["sexo"];
									  		foreach ($sexo as $s) {
									  			$idSexobd = $s->idSexo;
									  			$descripSexo = $s->descripSexo;
									  			if($idSexobd != $idSexo)
									  			{
									  				echo '<option value="'.$idSexobd.'">'.$descripSexo.'</option>';	
									  			}
									  			
									  		}
								  		?>
									</select>
								</div>
							</div>
							
							<div class="col-12">
								<label for="vscsContraseniaConfir" class="form-label"><?=$LabelProgreso;?></label>
								<div class="progress mb-3">
								  <div class="progress-bar fw-medium" role="progressbar" style="width: <?=$porcentaje;?>%" aria-valuenow="<?=$porcentaje;?>" aria-valuemin="0" aria-valuemax="100">
								    <?=$porcentaje;?>%
								  </div>
								</div>
							</div>
							<div class="col-12">
								<hr class="mt-2 mb-4">
								<div class="d-flex flex-wrap justify-content-between align-items-center">
									<!-- <div class="form-check d-block">
										<input class="form-check-input" type="checkbox" id="show-email" checked="">
										<label class="form-check-label" for="show-email">Show my email to registered users</label>
									</div> -->
									<button class="btn btn-primary mt-3 mt-sm-0" type="submit"><i class="ai-save fs-lg me-2"></i>Completar perfil</button>
								</div>
							</div>
							
						</div>
						<input type="hidden" name="idUsuario" id="idUsuario" value="<?=$idUsuario;?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="<?=base_url("js/JS_Usuario/JSU_Usuario.js")?>?t=<?=time()?>"></script>
