<?php
if ( ! defined("BASEPATH")) exit("No direct script access allowed");    
class L_Generales {

	function __construct(){
		$this->ci =& get_instance();
	}

	public function CSA_GetCodigoSeguridadConfirma() {
		$numeroAleatorio = rand(1, 999999);
		$codigoSeguridad = "";

		if(strlen($numeroAleatorio) < 6) {
			for($x = 1; $x <= (6-strlen($numeroAleatorio)); $x++) {
				$codigoSeguridad .= "0";
			}
			$codigoSeguridad .= $numeroAleatorio; 
		} else {
			$codigoSeguridad = $numeroAleatorio;
		}

		return $codigoSeguridad;
	}

	public function CSA_GenerarFechaVencimientoCodigo() {
		date_default_timezone_set("America/Mexico_City");

		$fechaActual = date('Y-m-d H:i'); 
		$fechaVenceCodigo = strtotime ( '+10 minute' , strtotime ($fechaActual) ) ; 
		$fechaVenceCodigo = date ( 'Y-m-d H:i' , $fechaVenceCodigo); 
		
		return $fechaVenceCodigo . ":00";
	}

	public function LG_GetFormatoFecha($fecha, $tipo){
		$fechaFormateada = "";
		$nombreDias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
		$nombreMeses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		/*$partefecha = explode(",", $fecha);
		$aux_fecha = $fecha;
		$hora_fecha = "";

		if(count($partefecha) == 2) {
			$aux_fecha = $partefecha[0];
			$hora_fecha = $partefecha[1].trim();
		}*/
		
		
		date_default_timezone_set("America/Mexico_City");
		$fecha = strtotime($fecha);

		switch($tipo) {
			case "NomDiaddNomMesaaaa_hhmmss":
				$fechaFormateada = $nombreDias[date('w', $fecha)] . date(" d", $fecha) . " de ".$nombreMeses[date('n', $fecha)]." de ".date("Y", $fecha)." a las ".date("H:i", $fecha)." hrs.";
			break;
		}

		return $fechaFormateada;
	}
}
?>