<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CA_Cursos extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('L_Alertas');
		$this->load->library('L_Generales');
		$this->load->library('L_AdminCursos');
		$this->load->model("M_DatosCatNivelCurso");
		$this->load->model("M_DatosCatDivisa");
		$this->load->model("M_DatosCursos");
		$this->load->model("M_DatosCatModuloCurso");
		$this->load->model("M_DatosCatSesionModulo");
		
	}

	public function CAC_Principal() {

		$datosCatNivelCurso = $this->M_DatosCatNivelCurso->getCatNivelCurso();

		$datos["informacion"] = array("datosCatNivelCurso" => $datosCatNivelCurso);
		$datos["ubicacion_vista"] = "/V_Administracion/VA_Cursos/VAC_Principal"; 
		$this->load->view("Principal", $datos);
	}

	public function CAC_SetDatosCurso()	{
		if($this->input->post()) {

			$resCurso = $this->M_DatosCursos->getExisteCurso($this->input->post("nombreCurso"), $this->input->post("idNivelCurso"));

			if(count($resCurso) <= 0) {
				$hashCurso = md5($this->input->post("nombreCurso"));
				$valoresInsertNuevoCurso = array("idNivelCurso" => $this->input->post("idNivelCurso"),
												"nombreCurso" => $this->input->post("nombreCurso"),
												"hashCurso" => $hashCurso);
				$banderaCapturaNuevoCurso = $this->M_DatosCursos->setCursoNuevo($valoresInsertNuevoCurso);

				if($banderaCapturaNuevoCurso == 1) {
					echo "<input class='form-control form-control-sm' id='hashCurso' name='hashCurso' value='" . $hashCurso . "' type='text'/>";
				} else {
					$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al guarda los datos del nuevo curso. Intentalo mas tarde","danger");
				}

			} else {
				$this->l_alertas->LA_ShowAlertas("¡Alerta!","Los datos que deseas ingresar ya existen. Favor de verificar","warning");
			}
		} else {
			$this->l_alertas->LA_ShowAlertas("¡Error!","Lo sentimos, hubo un error al guarda los datos del nuevo curso. Intentalo mas tarde","danger");
		}
	}

	public function CAC_GetDatosCurso($hashCurso, $banderaAction) {
	
		$resCurso = $this->M_DatosCursos->getExisteCursoHash($hashCurso);

		if(count($resCurso) >= 1) {
			$datosGeneralesCurso = array();
			$datosImagenCurso = array();
			$datosCostosCurso = array();

			$datosCatNivelCurso = $this->M_DatosCatNivelCurso->getCatNivelCurso();
			$datosCatDivisa = $this->M_DatosCatDivisa->getCatDivisa();

			//-----==========Datos generales del curso==========-----//
			$resDatosGeneralesCurso = $this->M_DatosCursos->getDatosGeneralesCurso($hashCurso);

			foreach($resDatosGeneralesCurso as $datGralCurso) {
				$datosGeneralesCurso["nombreCurso"] = $datGralCurso->nombreCurso;
				$datosGeneralesCurso["descripGeneralCurso"] = $datGralCurso->descripGeneralCurso;
				$datosGeneralesCurso["descripEspecificaCurso"] = $datGralCurso->descripEspecificaCurso;
				$datosGeneralesCurso["idNivelCurso"] = $datGralCurso->idNivelCurso;
				$datosGeneralesCurso["descripNivelCurso"] = $datGralCurso->descripNivelCurso;
				$datosGeneralesCurso["iconoNivelCurso"] = $datGralCurso->iconoNivelCurso;
				$datosGeneralesCurso["fechaCreacionCurso"] = $this->l_generales->LG_GetFormatoFecha($datGralCurso->fechaCreacionCurso, "NomDiaddNomMesaaaa_hhmmss");
				if($datGralCurso->fechaPublicacionCurso != null) {
					$datosGeneralesCurso["fechaPublicacionCurso"] = $this->l_generales->LG_GetFormatoFecha($datGralCurso->fechaPublicacionCurso, "NomDiaddNomMesaaaa_hhmmss");
				}
				
				$datosGeneralesCurso["descripEstatusCurso"] = $datGralCurso->descripEstatusCurso;
			}
			if($datosGeneralesCurso["descripGeneralCurso"] != "") {
				$datosGeneralesCurso["edit"] = "true";
			} else {
				$datosGeneralesCurso["edit"] = "false";
			}

			//-----==========Datos de la imagen del curso==========-----//

			$resDatosImagenCurso = $this->M_DatosCursos->getImagenCurso($hashCurso);

			foreach($resDatosImagenCurso as $datImgCurso) {
				if(strlen($datImgCurso->imagenCurso) >= 1) {
					$datosImagenCurso["edit"] = "true";
				} else {
					$datosImagenCurso["edit"] = "false";
				}
			}
			$datosImagenCurso["urlImgCurso"] = $this->l_admincursos->LF_GetImagenCurso($hashCurso);

			//-----==========Datos de la información de costos==========-----//

			$resDatosCostosCurso = $this->M_DatosCursos->getCostosCurso($hashCurso);
			$datosCostosCurso["idDivisa"] = "";
			$datosCostosCurso["descripDivisa"] = "";
			$datosCostosCurso["abreviaturaDivisa"] = "";
			$datosCostosCurso["precioActual"] = "";
			$datosCostosCurso["precioAnterior"] = "";

			if(count($resDatosCostosCurso) >= 1) {
				foreach($resDatosCostosCurso as $datCostoCurso) {
					$datosCostosCurso["idDivisa"] = $datCostoCurso->idDivisa;
					$datosCostosCurso["descripDivisa"] = $datCostoCurso->descripDivisa;
					$datosCostosCurso["abreviaturaDivisa"] = $datCostoCurso->abreviaturaDivisa;
					$datosCostosCurso["precioActual"] = $datCostoCurso->precioActual;
					$datosCostosCurso["precioAnterior"] = $datCostoCurso->precioAnterior;
				}
				$datosCostosCurso["edit"] = "true";
			} else {
				$datosCostosCurso["edit"] = "false";
			}

			$datos["informacion"] = array("hashCurso" => $hashCurso,
										"datosCatNivelCurso" => $datosCatNivelCurso,
										"datosCatDivisa" => $datosCatDivisa,
										"datosGeneralesCurso" => $datosGeneralesCurso,
										"datosImagenCurso" => $datosImagenCurso,
										"datosCostosCurso" => $datosCostosCurso);
			$datos["ubicacion_vista"] = "/V_Administracion/VA_Cursos/VAC_GetCurso"; 
			$this->load->view("Principal", $datos);

			$this->CEP_GetMessageActionsCurso($banderaAction);
		} else {
			$datos["informacion"] = array();
			$datos["ubicacion_vista"] = "/V_Administracion/VA_Cursos/VAC_NoExisteCurso"; 
			$this->load->view("Principal", $datos);
		}		
	}

	public function CEP_SetInformacionCurso()	{
		if($this->input->post()) {
			$banderaAction = "f1a6";

			switch($this->input->post("seccionAccionada")) {
				case 'datGralCurso'://Datos generales del curso
					$banderaAction .= "-d416al";
					$datosUpdateDatosCurso = array("nombreCurso" => $this->input->post("nombreCurso"),
													"descripGeneralCurso" => $this->input->post("descripGeneralCurso"),
													"descripEspecificaCurso" => $this->input->post("descripEspecificaCurso"),
													"idNivelCurso" => $this->input->post("idNivelCurso"));
					$where = array("hashCurso" => $this->input->post("hashCurso"));

					$banderaDescripCurso = $this->M_DatosCursos->updateDatosCurso($datosUpdateDatosCurso, $where);

					if($banderaDescripCurso == 1) {
						if($this->input->post("actionSeccion") == "INSERT") {
							$banderaAction .= "-115e1";
						} else {
							$banderaAction .= "-2uda1";
						}						
					} else {
						$banderaAction .= "-e1101";
					}
				break;

				case 'datImgCurso':
					$banderaAction .= "-1a6ea1";

					$imagenTemporal = $_FILES['imagenCurso']['tmp_name'];
					$dataImg=file_get_contents($imagenTemporal);

					$datosUpdateDatosCurso = array("imagenCurso" => $dataImg);
					$where = array("hashCurso" => $this->input->post("hashCurso"));

					$banderaImagenCurso = $this->M_DatosCursos->updateDatosCurso($datosUpdateDatosCurso, $where);

					if($banderaImagenCurso == 1) {
						if($this->input->post("actionSeccion") == "INSERT") {
							$banderaAction .= "-115e1";
						} else {
							$banderaAction .= "-2uda1";
						}						
					} else {
						$banderaAction .= "-e1101";
					}
				break;

				case 'datCostCurso':
					$banderaAction .= "-1foc05";
					$datosUpdateDatosCurso = array("idDivisa" => $this->input->post("idDivisa"),
													"precioActual" => $this->input->post("precioActual"),
													"precioAnterior" => $this->input->post("precioAnterior"));
					$where = array("hashCurso" => $this->input->post("hashCurso"));

					$banderaCostosCurso = $this->M_DatosCursos->updateDatosCurso($datosUpdateDatosCurso, $where);

					if($banderaCostosCurso == 1) {
						if($this->input->post("actionSeccion") == "INSERT") {
							$banderaAction .= "-115e1";
						} else {
							$banderaAction .= "-2uda1";
						}						
					} else {
						$banderaAction .= "-e1101";
					}
				break;
			}

			if(strlen($banderaAction) > 4) {
				//echo "Administracion-GetCurso/" . $this->input->post("hashCurso") . "/" . $banderaAction;
				redirect("Administracion-GetCurso/" . $this->input->post("hashCurso") . "/" . $banderaAction);
			}

		}
	}

	public function CEP_GetMessageActionsCurso($banderaAction) {
		if(strlen($banderaAction) == 17) {
			$parteBanderaAction = explode("-", $banderaAction);
			if(count($parteBanderaAction) == 3) {
				if($parteBanderaAction[0] == "f1a6") {
					$apartadoAdminCurso = "";
					$actionAdminCurso = "";
					$colorActionAdminCurso = "";
					$typeAction = "";

					switch($parteBanderaAction[1]) {
						case 'd416al'://Datos generales del curso
							$apartadoAdminCurso = "Datos generales del curso";
						break;
						case '1a6ea1'://Imagen principal del curso
							$apartadoAdminCurso = "Imágen principal del curso";
						break;
						case '1foc05'://Informacion de costos
							$apartadoAdminCurso = "Información de costos";
						break;
						case 'cud0u5'://Administracion de modulos
							$apartadoAdminCurso = "Administración de modulos";
						break;
						case 'cud5e5'://Administracion de sesiones
							$apartadoAdminCurso = "Administración de sesiones";
						break;
						case 'ue4ea5'://Que se aprendera en el curso
							$apartadoAdminCurso = "¿Que se aprendera en el curso?";
						break;
						case 'e6a5fe'://Preguntas Frecuentes
							$apartadoAdminCurso = "Preguntas frecuentes";
						break;
					}

					switch($parteBanderaAction[2]) {
						case '115e1'://Insert
							$actionAdminCurso = "se guardó correctamente.";
							$colorActionAdminCurso = "success";
							$typeAction = "¡Éxito!";
						break;
						case '2uda1'://Update
							$actionAdminCurso = "se modificó correctamente.";
							$colorActionAdminCurso = "warning";
							$typeAction = "¡Éxito!";
						break;
						case '3de1e'://Delete
							$actionAdminCurso = "se eliminó correctamente.";
							$colorActionAdminCurso = "warning";
							$typeAction = "¡Éxito!";
						break;
						case 'e8s17'://Exist
							$actionAdminCurso = "ya existe. Favor de validar.";
							$colorActionAdminCurso = "warning";
							$typeAction = "¡Información!";
						break;
						case 'e1101'://Error
							$actionAdminCurso = "se encontro error al realizar la operación";
							$colorActionAdminCurso = "warning";
							$typeAction = "¡Error!";
						break;
					}
					if(strlen($apartadoAdminCurso) >= 1 && strlen($actionAdminCurso) >= 1) {
						$messageAction = "La información de la sección <strong>" . $apartadoAdminCurso . "</strong> " . $actionAdminCurso;
						$this->l_alertas->LA_ShowAlertas($typeAction, $messageAction, $colorActionAdminCurso);
					}					
				}
			}
		}

	}

	public function CEP_GetAccionModuloCurso() {
		
		if($this->input->post()) {

			$nombreModulo = "";

			if($this->input->post("actionModulo") == "EDIT") {
				
				$resDatosNombreModulo = $this->M_DatosCatModuloCurso->getNombreModuloCurso($this->input->post("idModulo"));
				if(count($resDatosNombreModulo) >= 1) {
					$nombreModulo = $resDatosNombreModulo[0]->nombreModulo;
				}
			} 

			$datos["informacion"] = array("nombreModulo" => $nombreModulo);
			$datos["ubicacion_vista"] = "/V_Administracion/VA_Cursos/VAC_Modulos/VACM_SetDatosModuloCurso"; 
			$this->load->view("Contenido", $datos);
		} else {
			$this->l_alertas->LA_ShowAlertas("¡Error!", "Existe un error al intentar generar acciones para la administración de los modulos de los cursos", "danger");
		}
	}

	public function CEP_SetAccionModuloCurso() {
		if($this->input->post()) {

			switch($this->input->post("actionModulo")) {
				case 'ADD':
					$resModuloCurso = $this->M_DatosCatModuloCurso->getExisteModuloCurso($this->input->post("nombreModulo"));

					if(count($resModuloCurso) <= 0) {
						$resDatosCurso = $this->M_DatosCursos->getExisteCursoHash($this->input->post("hashCurso"));
						$hashModulo = md5($this->input->post("nombreModulo"));

						$valoresInsertModuloCurso = array("idCurso" => $resDatosCurso[0]->idCurso,
														"nombreModulo" => $this->input->post("nombreModulo"),
														"hashModulo" =>  $hashModulo);
						$banderaInsertModuloCurso = $this->M_DatosCatModuloCurso->setModuloCurso($valoresInsertModuloCurso);

						if($banderaInsertModuloCurso >= 1) {
							echo "<input class='form-control form-control-sm' id='banderaAccionDatosCurso' name='banderaAccionDatosCurso' value='TRUE-MODULO' type='text'/>";
							$this->l_alertas->LA_ShowAlertas("¡Éxito!", "La información del <strong>Módulo</strong> se guardó correctamente", "success");
						} else {
							$this->l_alertas->LA_ShowAlertas("¡Error!", "Hubo un error al intentar guardar el módulo del curso", "danger");
						}
					} else {
						$this->l_alertas->LA_ShowAlertas("¡Información!", "Los datos que desea guardar del <strong>Módulo</strong>, ya existen. Favor de validar.", "primary");
					}
				break;
				case 'EDIT':
					$valoresUpdateModuloCurso = array("nombreModulo" => $this->input->post("nombreModulo"));
					$where = array("idModulo" => $this->input->post("idModulo"));
					$banderaInsertModuloCurso = $this->M_DatosCatModuloCurso->updateModuloCurso($valoresUpdateModuloCurso, $where);

					if($banderaInsertModuloCurso >= 1) {
						echo "<input class='form-control form-control-sm' id='banderaAccionDatosCurso' name='banderaAccionDatosCurso' value='TRUE-MODULO' type='text'/>";
						$this->l_alertas->LA_ShowAlertas("¡Éxito!", "La información del <strong>Módulo</strong> se modificó correctamente", "success");
					} else {
						$this->l_alertas->LA_ShowAlertas("¡Error!", "Hubo un error al intentar modificar el módulo del curso", "danger");
					}
				break;
				case 'DELETE':
				break;
			}

		} else {
			$this->l_alertas->LA_ShowAlertas("¡Error!", "Existe un error al intentar generar acciones para la administración de los modulos de los cursos", "danger");
		}
	}

	public function CEP_GetModulosCurso() {
		$resDatosModuloCurso = $this->M_DatosCatModuloCurso->getCatModuloCurso($this->input->post("hashCurso"));

		$datos["informacion"] = array("datosModuloCurso" => $resDatosModuloCurso);
		$datos["ubicacion_vista"] = "/V_Administracion/VA_Cursos/VAC_Modulos/VACM_GetDatosModuloCurso"; 
		$this->load->view("Contenido", $datos);
	}

	public function CEP_GetAccionSesionModulo() {
		if($this->input->post()) {

			$datosSesionCurso = array("idSesionModulo" => "", "nombreSesion" => "", "urlMaterialSesion" => "", "hashSesion" => "", "duracionSesion" => "");

			if($this->input->post("actionSesion") == "EDIT") {
				
				$resDatosSesionCurso = $this->M_DatosCatSesionModulo->getDatosSesionModulo($this->input->post("idSesionModulo"));
				if(count($resDatosSesionCurso) >= 1) {
					$datosSesionCurso["idSesionModulo"] = $resDatosSesionCurso[0]->idSesionModulo;
					$datosSesionCurso["nombreSesion"] = $resDatosSesionCurso[0]->nombreSesion;
					$datosSesionCurso["urlMaterialSesion"] = $resDatosSesionCurso[0]->urlMaterialSesion;
					$datosSesionCurso["hashSesion"] = $resDatosSesionCurso[0]->hashSesion;
					$datosSesionCurso["duracionSesion"] = $resDatosSesionCurso[0]->duracionSesion;
				}
			} 

			$datos["informacion"] = array("actionSesion" => $this->input->post("actionSesion"),
										"datosSesionCurso" => $datosSesionCurso);
			$datos["ubicacion_vista"] = "/V_Administracion/VA_Cursos/VAC_Sesiones/VACS_SetDatosSesionModulo"; 
			$this->load->view("Contenido", $datos);
		} else {
			$this->l_alertas->LA_ShowAlertas("¡Error!", "Existe un error al intentar generar acciones para la administración de las sesiones de los modulos", "danger");
		}
	}

	public function CEP_SetAccionSesionModulo() {
		if($this->input->post()) {

			switch($this->input->post("actionSesion")) {
				case 'ADD':
					$resSesionModulo = $this->M_DatosCatSesionModulo->getExisteSesionModulo($this->input->post("nombreSesion"), $this->input->post("idModulo"));
					
					if(count($resSesionModulo) <= 0) {
						$resHashModulo = $this->M_DatosCatModuloCurso->getHashModuloCurso($this->input->post("idModulo"));
						$hashSesion = md5($this->input->post("nombreSesion"));
						$urlMaterialSesion = $this->l_admincursos->LF_SetMaterialSesionModulo($_FILES["materialSesion"], $this->input->post("hashCurso"), $resHashModulo[0]->hashModulo, $hashSesion);

						$valoresInsertSesionModulo = array("idModulo" => $this->input->post("idModulo"),
														"nombreSesion" => $this->input->post("nombreSesion"),
														"urlMaterialSesion" => $urlMaterialSesion,
														"duracionSesion" => $this->input->post("duracionSesion"),
														"hashSesion" => $hashSesion);
						$banderaInsertSesionModulo = $this->M_DatosCatSesionModulo->setSesionModulo($valoresInsertSesionModulo);

						if($banderaInsertSesionModulo >= 1) {
							echo "<input class='form-control form-control-sm' id='banderaAccionDatosCurso' name='banderaAccionDatosCurso' value='TRUE-SESION' type='text'/>";
							$this->l_alertas->LA_ShowAlertas("¡Éxito!", "La información de la <strong>Sesión</strong> se guardó correctamente", "success");
						} else {
							$this->l_alertas->LA_ShowAlertas("¡Error!", "Hubo un error al intentar guardar la sesión del módulo seleccionado", "danger");
						}
					} else {
						$this->l_alertas->LA_ShowAlertas("¡Información!", "Los datos que desea guardar de la <strong>Sesión del modulo seleccionado</strong>, ya existen. Favor de validar.", "primary");
					}
				break;
				case 'EDIT':

					$valoresUpdateSesionModulo = array("nombreSesion" => $this->input->post("nombreSesion"),
														"duracionSesion" => $this->input->post("duracionSesion"));
					$where = array("idSesionModulo" => $this->input->post("idSesionModulo"));

					if($this->input->post("changeMaterial") == "1") {
						$resHashModulo = $this->M_DatosCatModuloCurso->getHashModuloCurso($this->input->post("idModulo"));
						$urlMaterialSesion = $this->l_admincursos->LF_SetMaterialSesionModulo($_FILES["materialSesion"], $this->input->post("hashCurso"), $resHashModulo[0]->hashModulo, $this->input->post("hashSesion"));
						//array_push($valoresUpdateSesionModulo, $valoresUpdateSesionModulo["urlMaterialSesion"] = $urlMaterialSesion);
						$valoresUpdateSesionModulo["urlMaterialSesion"] = $urlMaterialSesion;
					}

					$banderaUpdateSesionModulo = $this->M_DatosCatSesionModulo->updateSesionModulo($valoresUpdateSesionModulo, $where);

					if($banderaUpdateSesionModulo >= 1) {
						echo "<input class='form-control form-control-sm' id='banderaAccionDatosCurso' name='banderaAccionDatosCurso' value='TRUE-SESION' type='text'/>";
						$this->l_alertas->LA_ShowAlertas("¡Éxito!", "La información de la <strong>sesión</strong> se modificó correctamente", "success");
					} else {
						$this->l_alertas->LA_ShowAlertas("¡Error!", "Hubo un error al intentar modificar e la sesión del módulo seleccionado", "danger");
					}
				break;
				/*case 'DELETE':
				break;*/
			}

		} else {
			$this->l_alertas->LA_ShowAlertas("¡Error!", "Existe un error al intentar generar acciones para la administración de las sesiones del modulo seleccionado", "danger");
		}
	}

	public function CEP_GetSesionModulo() {
		//$resDatosModuloCurso = $this->M_DatosCatModuloCurso->getCatModuloCurso($this->input->post("hashCurso"));

		if($this->input->post()) {
			$nombreModulo = "";
			$resDatosNombreModulo = $this->M_DatosCatModuloCurso->getNombreModuloCurso($this->input->post("idModulo"));
			$nombreModulo = $resDatosNombreModulo[0]->nombreModulo;

			$resDatosSesionModulo = $this->M_DatosCatSesionModulo->getCatSesionModulo($this->input->post("idModulo"));

			$datos["informacion"] = array("nombreModulo" => $nombreModulo,
										"datosSesionModulo" => $resDatosSesionModulo);
			$datos["ubicacion_vista"] = "/V_Administracion/VA_Cursos/VAC_Sesiones/VACS_GetDatosSesionModulo"; 
			$this->load->view("Contenido", $datos);

		}
		
	}


}
?>

