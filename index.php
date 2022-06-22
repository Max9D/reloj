<?php
	//  http://localhost/Pro2/index.php?hr=5&min=35&seg=56
	
header("Content-type: image/png");
require_once("Punto.php");
require_once("Modelo.php");
require_once("Vista.php");
require_once("Controlador.php");

	date_default_timezone_set('America/Mexico_City'); 
	$hr= (int)date('g');
	$min= (int)date('i');
	$seg= (int)date('s');
		
	
	$v = new Vista();
	$m = new Modelo($hr,$min,$seg);
	$c = new Controlador();
	$c->exhibir($m, $v);


?>