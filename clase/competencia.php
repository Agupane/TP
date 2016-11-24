<?php
class competencia{
 			private $codigo;
 			private $nombre;
 			private $descripcion;
 			private $listaFactor;
 		}

/*class GestorCompetencia{
	public function 
}*/
class competenciaDAO{
	
	public function lazyCompetencias()
	{
		$conexion = new mysqli("localhost","root","","tp");
		$query="select codigo_competencia,nombre from competencia";
		$resultado = $conexion -> query($query);
		if($resultado){
			return $resultado;
	}
		else{
		echo "Error";
	}
	}
}

?>