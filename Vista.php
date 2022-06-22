<?php
	// Vista.php
	class Vista {
		public $img;
		public $ancho, $alto, $cx,$cy;
		public $blanco, $negro, $verdeclaro,$rojo,$azul;
		public function dibujarRelog(){
			$this->ancho = 440;
			$this->alto = 440;
			$this->cx = $this->ancho/2;
			$this->cy = $this->alto/2;
			$this->img = imagecreate($this->ancho, $this->alto);
			$this->blanco = imagecolorallocate($this->img, 255, 255, 255);
			$this->negro = imagecolorallocate($this->img, 0, 0, 0);
			$this->rojo = imagecolorallocate($this->img, 255, 0, 0);
			$this->verdeclaro = imagecolorallocate($this->img, 196, 237, 220);
			$this->azul = imagecolorallocate($this->img, 0,0,255);
			imagefilledrectangle($this->img, 0, 0, $this->ancho, $this->alto, $this->blanco);
			//imagefilledrectangle($this->img, 0, 0, $modelo->ancho, $modelo->alto, $this->blanco);
			imagefilledellipse($this->img, $this->cx, $this->cy, $this->ancho-30, $this->alto-30, $this->negro);
			//queda 400x400 area del reloj
			imagefilledellipse($this->img, $this->cx, $this->cy, $this->ancho-40, $this->alto-40, $this->verdeclaro);//relog dibujar 

			//dibujar centro
			imagefilledellipse($this->img, $this->cx-2, $this->cy-2, 4, 4, $this->negro);
			

		}
		public function dibujarMinSeg(){
			//marca las 12,3,6,9
		
			$den=60;
			$ang_rad_ini = -1.6;
			$radio = 195;
			$radio_ini = 185;
			$ang_rad_div = 2*M_PI / $den;
		
			for($i=0; $i<$den; $i++){

				//puntos iniciales
				$x_i = $this->cx + $radio_ini * cos($ang_rad_ini);
				$y_i = $this->cy + $radio_ini * sin($ang_rad_ini);	
				//puntos finales
				$x = ($this->cx) + $radio * cos($ang_rad_ini);
				$y = ($this->cy) + $radio * sin($ang_rad_ini);	

				$ang_rad_ini = $ang_rad_ini + $ang_rad_div;		
				
				if((($i) % 5)==0){
					//imageline($this->img, $x_i, $y_i, $x , $y , $this->azul);
					//imagestring($this->img, 5, $x , $y, (string)$i, $this->negro);
					imagefilledellipse($this->img,  $x , $y, 4, 4, $this->negro);
				}
				else{
					imageline($this->img, $x_i, $y_i, $x , $y , $this->negro);
				}				


			}
		

		}
		public function dibujarMedias(){
			//marca las 12,3,6,9			
			$den=4;
			$ang_rad_ini = 0;
			$radio = 195;
			$radio_ini = 180;
			$ang_rad_div = 2*M_PI / $den;
		
			for($i=0; $i<$den; $i++){

				//puntos iniciales
				$x_i = $this->cx + $radio_ini * cos($ang_rad_ini);
				$y_i = $this->cy + $radio_ini * sin($ang_rad_ini);	
				//puntos finales
				$x = ($this->cx) + $radio * cos($ang_rad_ini);
				$y = ($this->cy) + $radio * sin($ang_rad_ini);	

				$ang_rad_ini = $ang_rad_ini + $ang_rad_div;		
				
				imageline($this->img, $x_i, $y_i, $x , $y , $this->rojo);


				if($i==0){
					imagestring($this->img, 5, $x-30,$y-8, '3', $this->negro);
					imageline($this->img, $x,$y,$x-20,$y,$this->rojo);
					imagefilledrectangle($this->img, $x-20,$y-2,$x,$y+2, $this->rojo);
				}
				if($i==1){
					imagestring($this->img, 5, $x-5,$y-35, '6', $this->negro);
					imageline($this->img, $x,$y,$x,$y-20,$this->rojo);
					imagefilledrectangle($this->img, $x-2,$y-2,$x+2,$y-20, $this->rojo);
				}
				if($i==2){
					imagestring($this->img, 5, $x+25,$y-8, '9', $this->negro);
					imageline($this->img, $x,$y,$x+20,$y,$this->rojo);
					imagefilledrectangle($this->img, $x+2,$y-2,$x+20,$y+2, $this->rojo);
				}
				if($i==3){
					imagestring($this->img, 5, $x-8,$y+20, '12', $this->negro);
					//imageline($this->img, $x,$y,$x,$y+20,$this->rojo);
					imagefilledrectangle($this->img, $x-2,$y+2,$x+2,$y+20, $this->rojo);
				}
			}
		

		}
		public function dibujarHoraEnReloj($model){
		//1.10471975512
			$den=60;
			$ang_rad_ini =-1.6;
			$radio_ini = 170;
			$ang_rad_div = 2*M_PI / $den;
			
			$r_hora=((int)$model->hr*5);
			$r_min=$model->min;
			$r_seg=$model->seg;

			//imagefilledellipse($this->img, $this->cx-2, $this->cy-2, 4, 4, $this->negro);
			
			for($i=0; $i<$den; $i++){

				//puntos iniciales
				$x = $this->cx + $radio_ini * cos($ang_rad_ini);
				$y = $this->cy + $radio_ini * sin($ang_rad_ini);
				$ang_rad_ini = $ang_rad_ini + $ang_rad_div;		
				if($r_hora==$i){
					imageline($this->img, $this->cx, $this->cy, $x , $y , $this->negro);
	
				}

				if($r_min==$i){
					imageline($this->img, $this->cx, $this->cy, $x , $y , $this->azul);

				}

				if($r_seg==$i){
					imageline($this->img, $this->cx, $this->cy, $x , $y , $this->rojo);

				}

			}

		}
	

		public function dibujarHora($modelo){
			imagestring($this->img, 3, $this->cx-50, $this->cy, 'hora:'. (string)$modelo->hr . ' Min:'. (string)$modelo->min .' Seg:'. (string)$modelo->seg, $this->negro);	
		}
		public function verLiberar(){
			//imagefilledellipse($this->img, $this->cx, $this->cy, $this->ancho-55, $this->alto-55, $this->verdeclaro);//relog dibujar 
			imagepng($this->img);
			imagedestroy($this->img);
		}
		
	
	}
?>