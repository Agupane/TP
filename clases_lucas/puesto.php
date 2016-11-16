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
            public function addPonderacion(ponderacionCompetencia $po){
                $this->listaPonderacionCompetencia[]=$po;
            }

            public function getNombre(){
                return $this->nombre;
            }
            //devuelve una empresa
            public function getEmpresa(){
                return $this->empresa;
            }
            public function getDescripcion(){
                return $this->descripcion;
            }
            public function getCodigo(){
                return $this->codigo;
            }



            public function mostrarListaPonderacionCompetencia (){
                $lista = $this->listaPonderacionCompetencia;
                echo count($lista) . "<br>";
                for ($j=0; $j<count($lista);$j++ ){
                    echo $lista[$j]->getNombreCompetencia() . "->" . $lista[$j]->getPonderacion();


                }
 		     }
            public function getListaPonderacionCompetencia(){
                return $this->listaPonderacionCompetencia;
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
    public function getIdEmpresaDTO()
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

    public function getCompetencia($indice){
        $lista=$this->caracteristicasPuesto;
        return $lista[$indice][0];

    }

    public function getPonderacion($indice){
        $lista=$this->caracteristicasPuesto;
        return $lista[$indice][1];
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
            
        
    //busco la instancia de empresa con el id en el dto
        $empresa = $this->buscarEmpresa( $unPuestoDTO->getIdEmpresaDTO());
    //creo el dto que despues voy a guardar
        $pu = new Puesto($unPuestoDTO->getCodigo(), $unPuestoDTO->getNombre(), $unPuestoDTO->getDescripcion(),$empresa);

    //creo las ponderaciones    
    for($i=0; $i<count($unPuestoDTO->getCaracteristicasPuesto());$i++){

        $competenciaDAO= new competenciaDAO;
        $competencia=$competenciaDAO->getCompetencia($unPuestoDTO->getCompetencia($i));

        $ponderacion=$unPuestoDTO->getPonderacion($i);

        $po=new ponderacionCompetencia($competencia,$ponderacion);

        $pu->addPonderacion($po);

    }

        $puestoDAO = new puestoDAO;
        $puestoDAO->guardar($pu);

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
        return(is_string($unDto->getNombre()) &&
                is_int($unDto->getCodigo()) &&
                is_string($unDto->getDescripcion()) &&
                is_int($unDto->getIdEmpresa()) &&
                is_array($unDto->getCaracteristicasPuesto()) &&
           !(is_null($unDto->getNombre()) &&
            is_null($unDto->getCodigo()) &&
            is_null($unDto->getDescripcion()) &&
            is_null($unDto->getIdEmpresa()) &&
            is_null($unDto->getCaracteristicasPuesto()))
                );
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

    public function guardar(puesto $pu){
        $conexion = new mysqli("localhost","root","","tp");
        $codigo = $pu->getCodigo();
        $nombre = $pu->getNombre();
        $eliminado = false;
        /*$empresa = $pu->getEmpresa();
        $id=$empresa->getIdEmpresa();*/

        $descripcion = $pu->getDescripcion();
        echo $codigo;
        echo $eliminado;
        echo $nombre;
        
        //guarda puesto, el for guarda las ponderaciones
        //mirar que la columna esta mal escrita en la base de datos 
        $query="INSERT INTO puesto (codigo_puesto,nombre,descripcion,elimiando) VALUES ($codigo,$nombre,$descripcion,$eliminado,NULL) ";
        $resultado = $conexion -> query($query);
        if($resultado){
            echo "llego al sql";
        }
            /*
            $lista=$pu->getListaPonderacionCompetencia;
             for ($j=0; $j<count($lista);$j++ ){
                    echo $lista[$j]->getNombreCompetencia() . "->" . $lista[$j]->getPonderacion();


                }*/
             }





    }

?>