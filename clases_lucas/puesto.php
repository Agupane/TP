<?php
class Puesto{
 			private $codigo;
 			private $nombre;
 			private $eliminado;
 			private $empresa;
 			private $descripcion;
 			private $listaPonderacionCompetencia;
 			private $cuestionario;

            public function __construct($codigo,$nombre,$descripcion,$empresa){
                $this->codigo= $codigo;
                $this->nombre= $empresa;
                $this->eliminado = false;
                $this->descripcion = $descripcion;
                $this->empresa = $empresa;
                $this->listaPonderacionCompetencia=array();
                $this->cuestionarios=null;

            }
 		
}

class PuestoDTO{
 			private $codigo;
            private $nombre;
            private $idEmpresa;
            private $descripcion;
            private $caracteristicasPuesto; /* va a tener un array con dos elementos en casda posicion*/
    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    /**
     * @return mixed
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setIdEmpresa($empresa)
    {
        $this->idEmpresa = $empresa;
    }


    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


    /**
     * @return mixed
     */
    public function getCaracteristicasPuesto()
    {
        return $this->caracteristicasPuesto;
    }

    /**
     * @param mixed $caracteristicasPuesto
     */
    public function setCaracteristicasPuesto($caracteristicasPuesto)
    {
        $this->caracteristicasPuesto = $caracteristicasPuesto;
    }
 		}


class GestorPuesto{
    public static $instancia;

    public static function getInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function guardar(puestoDTO $unPuestoDTO){
        /* por ahora no funciona la validacion
        if($this->ValidarNulidadYTipo($unDTO)){
            echo "funciona nulidad y tipo";
        }*/
        if(!($this->ValidarNombre($unPuestoDTO->getNombre())) ){
            
        
        
        $empresa = $this->buscarEmpresa( $unPuestoDTO->getIdEmpresa());
        $pu = new Puesto($unPuestoDTO->getCodigo(), $unPuestoDTO->getNombre(), $unPuestoDTO->getDescripcion(),$empresa);
        echo "funciona hasta aca";
    }


    }

	public function getAllEmpresas(){
	$empresaDAO = new empresaDAO;
	$resultado = $empresaDAO->getAll();
	return $resultado;

	}

    public function buscarEmpresa($id_Empresa){
    $empresaDAO = new empresaDAO;
    $resultado = $empresaDAO->buscarEmpresa($id_Empresa);
    return $resultado;}

	public function ValidarNulidadYTipo( PuestoDTO $unDto){
      	
        if  (is_string($unDto->getNombre()) &&
                is_int($unDto->getCodigo()) &&
                is_string($unDto->getDescripcion()) &&
                is_int($unDto->getempresa()) &&
                is_array($unDto->getCaracteristicasPuesto()) &&
           !(is_null($unDto->getNombre()) &&
            is_null($unDto->getCodigo()) &&
            is_null($unDto->getDescripcion()) &&
            is_null($unDto->getempresa()) &&
            is_null($unDto->getCaracteristicasPuesto()))
                ){ return true;}
    else return false;


    }
    public function ValidarNombre($nombre){
        $puestoDAO = new PuestoDAO();
        return($puestoDAO->ValidarNombre($nombre));
        // retorna true si ya existe uno y false si no existe;
    }


}

class PuestoDAO{

    public function ValidarNombre($nombre){
        $flag = false;
        $base = new mysqli("localhost","root","","tp");
        $sql = "SELECT nombre FROM puesto";
        $resultado = $base->query($sql);
        while ($row = $resultado->fetch_assoc()){
            if($row['nombre'] == $nombre){
                $flag = true;
            }
        }
        $base->close();
        return($flag);
        
    }
}

?>