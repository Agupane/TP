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
		$query="SELECT codigo_competencia,nombre from competencia";
		$resultado = $conexion->query($query);
		if($resultado){
			return $resultado;
	}
		else{
		echo "Error";
	}
	}
}

/**
* 
*/
class GestorCompetencia 
{
	public static $instancia;

    public static function getInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

  public function buscarCompetencias(){
  		$competenciaDAO= new competenciaDAO;
  		$resultado=$competenciaDAO->lazyCompetencias();
  		return $resultado;

  }  


}
?>