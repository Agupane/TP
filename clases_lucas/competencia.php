<?php
class competencia{
 			private $codigo;
 			private $nombre;
 			private $descripcion;
 			private $listaFactor;
 		

 		public function __construct($codigo_competencia,$nombre,$descripcion){
        	$this->codigo= $codigo_competencia;
        	$this->nombre= $nombre;
        	$this->descripcion=$descripcion;
            $this->listaFactor=array();


            }
        public function getNombre(){
        	return $this->nombre;
        }
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
	public function getCompetencia($codigo_competencia){
		//lo trae de forma lazy, no trae los factores
	    $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT * FROM competencia WHERE codigo_competencia=$codigo_competencia";
        $resultado = $conexion -> query($query);
        $row = $resultado->fetch_assoc();
        if($resultado){
            $competencia=new competencia($row['codigo_competencia'],$row['nombre'],$row['descripcion']);
        }
        else{
            return "Error";
        }
        $conexion->close();
        return $competencia;    
	

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