<?php 

Class cubo{
	
	private $cubo;
	private $suma;
	
		
	public function inicializar(){
		$x = 1;
		$y = 1;
		$z = 1;
		$cx = 4;
		$cy = 4;
		$cz = 4;
		for($x=1;$x<$cx;$x++){
			for($y=1;$y<$cy;$y++){
				for($z=1;$z<$cz;$z++){
					$this->cubo[$x][$y][$z] = 0;				
				}
			}
		}
	}

	public function establecer($x,$y,$z,$w){
		$this->cubo[$x][$y][$z] = $w;
	}

	public function consulta($post){
		$this->suma = 0;
			
		$x = $post["query1"]; // x1
		$y = $post["query2"]; // y1
		$z = $post["query3"]; // z1
		$x2 = $post["query4"]; // x2
		$y2 = $post["query5"]; //y2
		$z2 = $post["query6"]; //z2
		
		for($x=$post["query1"];$x<=$x2;$x++){		
			for($y=$post["query1"];$y<=$y2;$y++){	
				for($z=$post["query1"];$z<=$z2;$z++){
					if(isset($this->cubo[$x][$y][$z])){
						$this->suma = $this->cubo[$x][$y][$z] + $this->suma;
					}
				}
			}
		}
		return $this->suma;
	}

}

?>