<?php
	// Modelo.php 
	class Modelo {	// Diagrama de Flujo
		public $hr,$min,$seg;
		public function __construct($hrI,$minI,$segI){
			$this->hr = $hrI;
			$this->min = $minI;
			$this->seg = $segI;
		}
	}
?>