<?php
class competencia{
 			private $codigo;
 			private $nombre;
 			private $descripcion;
 			private $listaFactor;



 		        public function __construct($codigo,$nombre,$descripcion){
                $this->codigo= $codigo;
                $this->nombre=$nombre;
                $this->descripcion = $descripcion;
                $this->listaFactor=null;


            }}

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

	//busca una competencia dado un codigo_competencia. Lista de factores en nulo
	public function getCompetencia ( $codigo_competencia){
		$conexion = new mysqli("localhost","root","","tp");
		$query="SELECT * from competencia where codigo_competencia=$codigo_competencia";
		$resultado = $conexion -> query($query);

		if($resultado){
			$row=$resultado->fetch_assoc();
			$competencia= new Competencia($row['codigo_competencia'],$row['nombre'],$row['competencia']);


				}
    else{
        echo "Error";
    }}

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