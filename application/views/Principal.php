<?php
	$this->load->view('Cabecera');
	$this->load->view($ubicacion_vista,$informacion);
	$this->load->view('V_Estructura/VE_Notificaciones');
	$this->load->view('Pie');
?>