<?php
session_start();

if(!DEFINED("BASEPATH")) exit("Error");

class CI_Principal extends CI_Controller
{	
	public function __construct() {
		parent::__construct();
	}

	public function CIP_Home() {
		$arrayTarjetas = array();
		$rutaapp = base_url("index.php/e-learning")."?t=<?=time()";
		$rutaImagen = base_url("img/coinpinver/Inicio/EARN-PAGINA.jpg")."?t=<?=time()";
		$baseurl = base_url("img/coinpinver/Inicio/vih_elearning.png");
		array_push($arrayTarjetas, array("rutaImg"=>$rutaImagen, "titulo"=>"E-learning","descripcion"=>"Gana comisiones con nuestra criptomoneda CPRP ", "by"=>"Coinpinver", "rutaapp"=>$rutaapp, "idelemento"=>"elearning", "baseurl"=>$baseurl));

		$rutaapp = base_url("index.php/PlataformaLEARNING")."?t=<?=time()";
		$rutaImagen = base_url("img/coinpinver/Inicio/ELEARNING-PAGINA.jpg")."?t=<?=time()";
		$baseurl = base_url("img/coinpinver/Inicio/vih_earn.png");
		array_push($arrayTarjetas, array("rutaImg"=>$rutaImagen, "titulo"=>"EARN","descripcion"=>"Realiza la compra y venta de la criptomoneda CPRP.", "by"=>"Coinpinver", "rutaapp"=>$rutaapp, "idelemento"=>"plataformaEarn", "baseurl"=>$baseurl));

		$rutaapp = base_url("index.php/WhitePaper")."?t=<?=time()";
		$rutaImagen = base_url("img/coinpinver/Inicio/WHITEPAPER_PAGINA.jpg")."?t=<?=time()";
		$baseurl = base_url("img/coinpinver/Inicio/vih_whitepaper.png");
		array_push($arrayTarjetas, array("rutaImg"=>$rutaImagen, "titulo"=>"WhitePaper","descripcion"=>"Toda la información sobre la criptomoneda CPRP", "by"=>"Coinpinver", "rutaapp"=>$rutaapp, "idelemento"=>"whitepaper", "baseurl"=>$baseurl));

		//datos para la sección de la plataforma earn
		$arrayEarn= array();
		$rutaIcono = base_url("img/coinpinver/Inicio/906377.png")."?t=<?=time()";
		array_push($arrayEarn, array("icono"=>$rutaIcono, "titulo"=>"Únete en telegram", "alt"=>"Telegram", "descripcion"=>"Donde podrás realizar la compra de nuestra criptomoneda y utilizar nuestra plataforma EARN,", "textlink"=>"Ingresa aquí", "link"=>"https://t.me/+FI9Ps8v02ge0EwII"));

		$rutaIcono = base_url("img/coinpinver/Inicio/discord.jpg")."?t=<?=time()";
		array_push($arrayEarn, array("icono"=>$rutaIcono, "titulo"=>"Discored", "alt"=>"Discored", "descripcion"=>"Grupo de coinpinver ", "textlink"=>"discored", "link"=>"https://discord.gg/gUG79zQn"));

		$rutaIcono = base_url("img/coinpinver/Inicio/3670151.png")."?t=<?=time()";
		array_push($arrayEarn, array("icono"=>$rutaIcono, "titulo"=>"Únete a twitter", "alt"=>"twitter", "descripcion"=>"Ingresa a nuestra", "textlink"=>"página oficial", "link"=>"https://twitter.com/ECoinpinver"));

		$rutaIcono = base_url("img/logo/Coinpinver-Favicon.png")."?t=<?=time()";
		$rutaEarn = base_url("index.php/PlataformaEARN");
		array_push($arrayEarn, array("icono"=>$rutaIcono, "titulo"=>"Coinpinver phoenix CPRP", "alt"=>"EARN", "descripcion"=>"Compra nuestro criptomoneda desde nuestra ", "textlink"=>"plataforma EARN", "link"=>$rutaEarn));

		$arrayBeneficiosEarn = array();
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Invierte y gana haciendo STAKING"));
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Fácil registro, acceso y uso de la plataforma"));
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Transferencias entre cuentas gratuitas y en segundos"));
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Creación de más de una wallet"));
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Compras rápidas en criptomoneda CPRP "));
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Bajas comisiones por retiros y exchange"));
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Gráficos para trading"));		
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Comisiones por afiliados de 2%-8%"));
		array_push($arrayBeneficiosEarn, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Soporte y atención a usuarios las 24hrs"));
		
		$arraySeccionCripto = array();
		array_push($arraySeccionCripto, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Tecnología blockchain actualizada"));
		array_push($arraySeccionCripto, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Transacciones rápida"));
		array_push($arraySeccionCripto, array("icono"=>"ai-check-circle", "color-texto"=>"text-success", "beneficio"=>"Saca el mayor porcentaje de ganancias a tus criptomonedas"));
		
		// array para testimonios
		$baseurl_img = base_url("img/coinpinver/Usuario/avatar.png");
		$arrayTestimonios = array();
		array_push($arrayTestimonios, array("texto"=>
			"Soy una empresaria que tiene tiempo invirtiendo en criptomonedas y coinpinver me dio mucha confianza por sus proyectos que tiene en puerta y proyectos que en un futuro estará haciendo y feliz por ser parte de esta comunidad",
			"imagen"=>$baseurl_img,
			"nombre"=>"Esperanza"
		));
		array_push($arrayTestimonios, array("texto"=>
			"Yo compré la token por que conozco muchas historias donde la gente con una baja inversión con los años logró hacerse de un capital importante. Por eso no se me hace para nada descabellado, además confió en lo que sus creadores están haciendo. Saludos",
			"imagen"=>$baseurl_img,
			"nombre"=>"Antonio"
		));
		array_push($arrayTestimonios, array("texto"=>
			"Invertir en Coinpinver me ha dado la tranquilidad de saber que tengo una inversión que va ir creciendo con el tiempo, así como la confianza de que siempre están al pendiente de mis necesidades y dudas. Siempre cuento con una atención personalizada y solventando mis dudas",
			"imagen"=>$baseurl_img,
			"nombre"=>"Martha"
		));
		array_push($arrayTestimonios, array("texto"=>
			"Hola amigos, lo que me inspiró para invertir y hacer parte de la comunidad coinpinver (CPRP), primero fue el grupo de trabajo de profesionales que está detrás de este gran proyecto a nivel Latinoamérica, segundo la confianza que tengo en ellos, y tercero los grandes beneficios que vamos a lograr en un futuro no muy lejano. Vamos COINPINVER(CPRP)",
			"imagen"=>$baseurl_img,
			"nombre"=>"Carlos"
		));
		$datos["informacion"] = array("arrayTarjetas"=>$arrayTarjetas, "arrayEarn"=>$arrayEarn, "arrayBeneficiosEarn"=>$arrayBeneficiosEarn, "arraySeccionCripto"=>$arraySeccionCripto, "arrayTestimonios"=>$arrayTestimonios);
		$datos["ubicacion_vista"] = "/V_Inicio/VI_Home"; 
		$this->load->view("Principal", $datos);
	}
	public function CIP_Simulacion()
	{
		

		if($this->input->post("inver"))
		{
			$inversionInicial = $this->input->post("inver");
			$valorCPRP = 0.0203;
			$porciento = 8;
			$decimales = 2;
			$gananciaUsd = number_format($inversionInicial*$porciento/100, $decimales);
			$gananciaTotalUsd = $inversionInicial+$gananciaUsd;
			$conversionTotalCPRP = $gananciaTotalUsd/$valorCPRP;

			echo '
				<div class="table-responsive">
					<table class="table table-dark table-striped">
						<thead>
							<tr>
								<th>Inversión Inicial(USD)</th>
								<th>Ganancia a 6 meses(USD)</th>
								<th>Inversión más ganancia</th>
								<th>Conversión en CPRP</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>$'.$inversionInicial.'</td>
								<td>$'.$gananciaUsd.'</td>
								<td>$'.$gananciaTotalUsd.'</td>
								<td>'.$conversionTotalCPRP.'</td>
							</tr>
						</tbody>
					</table>
				</div>
			';
		}
		else{
			return;
		}
		
		
	}
	public function CIP_ShowInstruccionesRecompensas() {
		echo "<embed src='" . base_url("Archivos/Informe/20210916.pdf") . "' style='width:100%;height:455px;border: solid 1px white'>";
	}
	public function CPI_SellToken()
	{
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Inicio/VI_SellToken"; 
		$this->load->view("Principal", $datos);
	}
	public function CIP_ShowWhitePaper()
	{
		echo "<embed src='" . base_url("Archivos/whitepaper/whitepaper.pdf") . "' style='width:100%;height:455px;border: solid 1px white'>";
	}
	public function CIP_Prueba() {
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Prueba/VI_Inicio"; 
		$this->load->view("Principal", $datos);
	}
	public function CIP_Rifa(){
		$datos["informacion"] = array();
		$datos["ubicacion_vista"] = "/V_Inicio/VI_Rifa"; 
		$this->load->view("Contenido", $datos);	
	}
}
?>
