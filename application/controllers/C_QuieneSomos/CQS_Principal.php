<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CQS_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->model("M_DatosWhitePaper");
	}

	public function CQSP_Home() {
		$arrayDatosQuieneSomos = array();
		$rutaImg = "img/coinpinver/QuienesSomos/";
		$nombre="";
		
		$redesSociales = array("facebook"=>"", "twitter"=>"", "linkedin"=>"https://www.linkedin.com/in/diego-armando-rojo-moreno-635801137/", "instagram"=>"");
		array_push($arrayDatosQuieneSomos, array("rutaImg"=>$rutaImg."DARM.jpeg", "nombre"=>"Diego A. Rojo Moreno", "titulo"=>"CEO", "descripcion"=>'Inversionista de cripto-activos desde el año 2016 autor de "Como Sacar Ventaja de las Criptomonedas" volumen I Y II. Fundó CoinPinver con la principal misión de ayudar a la gente ha no caer en estafas y generar más con su dinero, así creando la plataforma <a href="https://www.coinpinver.com.mx/Coinpinver" target="_blank">CoinPinver</a> y a su vez Coinpinver Private Equity Fund. Con basta experiencia en el ámbito empresarial y de inversiones, sobre todo empresas privadas. Apasionado por  invertir en grande en el mundo cripto-activos y empresas privadas con tecnología Blockchain con el fin de fomentar el mundo de los negocios de una forma transparente.', "redesSociales"=>$redesSociales));

		$redesSociales = array("facebook"=>"", "twitter"=>"", "linkedin"=>"", "instagram"=>"https://www.instagram.com/jcharly.developer/");
		array_push($arrayDatosQuieneSomos, array("rutaImg"=>$rutaImg."JCCC.jpg", "nombre"=>"Juan Carlos Castillo Carrillo", "titulo"=>"DIRECTOR OF PLATFORM AND PROGRAMING", "descripcion"=>'Dedicado a realizar el diseño y desarrollo de las plataformas dentro de Conpinver. Ingeniero en Informática con experiencia en el análisis, diseño y desarrollo de sistemas en diversos lenguajes de programación nivel <strong>semi-senior</strong>, administración y mantenimiento de diversos OS; así como implementación de infraestructura de network basado en CLI de CISCO.',  "redesSociales"=>$redesSociales));
		
		$redesSociales = array("facebook"=>"", "twitter"=>"", "linkedin"=>"", "instagram"=>"");
		//array_push($arrayDatosQuieneSomos, array("rutaImg"=>$rutaImg."JJFS.jpeg", "nombre"=>"José Javier Fuentes De Sousa", "titulo"=>"DEVELOPER BLOCKCHAIN &amp; WEB", "descripcion"=>'Dedicado a la programación blockchain específicamente en la creación de contratos inteligentes en las redes de Ethereum, BSB, Avalanche entre otras. Programador Full stack (MERN).', "redesSociales"=>$redesSociales));

		$redesSociales = array("facebook"=>"", "twitter"=>"", "linkedin"=>"https://www.linkedin.com/in/alfredo-guti%C3%A9rrez-bastida-b391a6183", "instagram"=>"");
		array_push($arrayDatosQuieneSomos, array("rutaImg"=>$rutaImg."AG.jpeg", "nombre"=>"Alfredo Gutiérrez Bastida", "titulo"=>"Área Legal", "descripcion"=>'Cuento con amplia experiencia en el mundo de las Criptomonedas, así como en el manejo de fianzas y asesoría legal, he obtenido diversos estudios certificados.', "redesSociales"=>$redesSociales));
		$redesSociales = array("facebook"=>"", "twitter"=>"", "linkedin"=>"https://www.linkedin.com/in/juandelacruz2006/", "instagram"=>"");
		array_push($arrayDatosQuieneSomos, array("rutaImg"=>$rutaImg."JLDLCE.png", "nombre"=>"Juan Luis de la Cruz Esquivel", "titulo"=>"DEVELOPER WEB", "descripcion"=>'En función de desarrollador para la implementación de nuevas tecnologías, proponer nuevas ideas, optimizar procesos, con la capacidad de solucionar problemas, abierto a trabajar en equipo e individual, con nuevos lenguajes de programación para una mejor administración de un determinado proceso.', "redesSociales"=>$redesSociales));

		$redesSociales = array("facebook"=>"", "twitter"=>"", "linkedin"=>"https://www.linkedin.com/mwlite/in/luis-enrique-salazar-romero-18287410b", "instagram"=>"");
		array_push($arrayDatosQuieneSomos, array("rutaImg"=>$rutaImg."LC.jpg", "nombre"=>"Luis Enrique", "titulo"=>"VIDEO DESIGB & EDITING", "descripcion"=>'Dedicado al diseño, edición de video dentro de CoinPinver Licenciado en Diseño, Animación y arte digital con posgrado en Diseño multimedia y certificación en Motion Graphics.', "redesSociales"=>$redesSociales));

		$redesSociales = array("facebook"=>"", "twitter"=>"", "linkedin"=>"", "instagram"=>"");
		array_push($arrayDatosQuieneSomos, array("rutaImg"=>$rutaImg."AJ.png", "nombre"=>"Angel Javier", "titulo"=>"Editor de Videos y Marketing Digital", "descripcion"=>'Tengo 2 años de experiencia en edicion de videos, y actualmente mejoro mi trabajo cursando una tecnicatura en marketing digital, me encuentro orgullosamente trabajando para Coinpinver S.A..', "redesSociales"=>$redesSociales));
		
		$mision="Empresa lider mundial en blockchain exchangue en criptomonedas, y ser la criptomoneda con mayor cantidad de servicios favorables para nuestros inversores HOLDERS TRADERS";
		$vision="Primera empresa lider en latinoamerica y el mundo en blockchain con servicios de exchangue en criptomoneda, token y Prevalecer durante los proximos años para que los inversores tengan mayor rendimiento de forma segura y sólida,Que las siguientes generaciones tengan noción sobre los beneficios de estar en el nuevo sistema financiero de criptomonedas";

		$arrayDatos = $this->M_DatosWhitePaper->MDWP_getMisVis();
		
		
		$datos["informacion"] = array("arrayDatosQuieneSomos"=>$arrayDatosQuieneSomos, "arrayDatos"=>$arrayDatos);
		$datos["ubicacion_vista"] = "/V_QuieneSomos/VQS_Home"; 
		$this->load->view("Principal", $datos);
	}

}
?>
