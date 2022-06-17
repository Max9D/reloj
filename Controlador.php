<?php
	// Controlador.php
	class Controlador {
		public function exhibir($modelo, $vista){
			$vista->dibujarRelog();
			$vista->dibujarMinSeg();
			
			$vista->dibujarMedias();
			$vista->dibujarHoraEnReloj($modelo);
			$vista->dibujarHora($modelo);
			$vista->verLiberar();
		}
	}
?>