<?php
class Puesto{
 			private $codigo;
 			private $nombre;
 			private $eliminado;
 			private $empresa;
 			private $descripcion;
 			private $listaponderacionCompetencia;
 			private $cuestionario;

            public function __construct($codigo,$nombre,$descripcion,$empresa){
                $this->codigo= $codigo;
                $this->nombre= $empresa;
                $this->eliminado = false;
                $this->descripcion = $descripcion;
                $this->empresa = $empresa;
                $this->$listaponderacionCompetencia=null;
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
        return $this->IdEmpresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setIdEmpresa($empresa)
    {
        $this->IdEmpresa = $empresa;
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

    public function guardar(puestoDTO $unDTO){

        $this->ValidarNulidadYTipo($unDTO);
        $this->ValidarNombre($unDTO->getNombre());
        
        $empresa = $this->getEmpresa( $unDTO->getIdEmpresa());
        $pu = new Puesto($unPuestoDTO->getCodigo(), $unPuestoDTO->getNombre(), $unPuestoDTO->getDescripcion(),$empresa );



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
        return($unDto->getNombre()->is_string() &&
                $unDto->getCodigo()->is_int() &&
                $unDto->getDescripcion()->is_string() &&
                $unDto->getIdEmpresa()->is_int() &&
                $unDto->getCaracteristicasPuesto()->is_string() &&
           !($unDto->getNombre()->is_null() &&
            $unDto->getCodigo()->is_null() &&
            $unDto->getDescripcion()->is_null() &&
            $unDto->getIdEmpresa()->is_null() &&
            $unDto->getCaracteristicasPuesto()->is_null())
                );
    }
    public function ValidarNombre(PuestoDTO $unDTO){
        $valido = new PuestoDAO();
        return($valido->ValidarNombre($unDTO));
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