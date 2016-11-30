<?php
class Puesto{
 			private $codigo;
 			private $nombre;
 			private $eliminado;
 			private $empresa;
           /* private $enUso; */
 			private $descripcion;
 			private $listaPonderacionCompetencia;
 			private $cuestionario;

            public function __construct($codigo,$nombre,$descripcion,$empresa){
                $this->codigo= $codigo;
                $this->nombre= $nombre;
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

            public function enUso(){
                return (empty($this->cuestionarios));
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
       
        if(($this->ValidarNulidadYTipo($unPuestoDTO)) && !($this->ValidarNombre($unPuestoDTO->getNombre())) ){
            
           //busco la instancia de empresa con el id en el dto
        $empresaDAO= new empresaDAO;
        $empresa = $empresaDAO->buscarEmpresa( $unPuestoDTO->getIdEmpresaDTO());

    //creo el dto que despues voy a guardar
        $pu = new Puesto($unPuestoDTO->getCodigo(), $unPuestoDTO->getNombre(), $unPuestoDTO->getDescripcion(),$empresa);


        $competenciaDAO= new competenciaDAO;
    //creo las ponderaciones    
    for($i=0; $i<count($unPuestoDTO->getCaracteristicasPuesto());$i++){

        
        $competencia=$competenciaDAO->getCompetencia($unPuestoDTO->getCompetencia($i));

        $ponderacion=$unPuestoDTO->getPonderacion($i);
        $po=new ponderacionCompetencia($competencia,$ponderacion);

        $pu->addPonderacion($po);

    }

        $puestoDAO = new puestoDAO;
        $puestoDAO->save($pu);

    }
    else{header('Location:fracaso.php');}

    }

    public function eliminarPuesto($codigo_puesto,$id_consultor){
        $puesto=$this->getPuesto($codigo_puesto);
       if(!($puesto->enUso())) {
            date_default_timezone_set('America/Argentina/Buenos_Aires'); 
            $registroAuditoria= new RegistroAuditoria($puesto,date('Y-m-d'),date(' H:i:s A '),$id_consultor);
            $consultorDAO= new consultorDAO;
            $consultor=$consultorDTO->getConsultor($id_consultor);
            $consultor->addAuditoria($registroAuditoria);



       }


    }
	public function getAllEmpresas(){
	$empresaDAO = new empresaDAO;
	$resultado = $empresaDAO->getAll();
	return $resultado;

	}


	public function ValidarNulidadYTipo( PuestoDTO $unDto){
        if((is_string($unDto->getNombre()) &&
                        is_numeric($unDto->getCodigo()) &&
                        is_string($unDto->getDescripcion()) &&
                        is_numeric($unDto->getIdEmpresaDTO()) &&
                        is_array($unDto->getCaracteristicasPuesto()) &&
                   !(is_null($unDto->getNombre()) &&
                    is_null($unDto->getCodigo()) &&
                    is_null($unDto->getDescripcion()) &&
                    is_null($unDto->getIdEmpresaDTO()) &&
                    is_null($unDto->getCaracteristicasPuesto()))
                        )
                ){return true;}
            else return false;
    }
    public function ValidarNombre($nombre){
        $puestoDAO = new PuestoDAO();
        return($puestoDAO->ValidarNombre($nombre));
        // retorna true si ya existe uno y false si no existe;
    }

    public function buscarContiene ($codigo,$nombre,$id_empresa){

        $puestoDAO= new PuestoDAO; 
        $resultado= $puestoDAO->buscarContiene($codigo,$nombre,$id_empresa);
        return $resultado;

    }
    public function buscarNombreEmpresa($id_empresa){
        $empresaDAO= new empresaDAO;
        $empresa = $empresaDAO->buscarEmpresa( $id_empresa);
        return $empresa->getNombre();

    }
    public function buscarPuestos(){
        $puestoDAO = new puestoDAO;
        $resultado = $puestoDAO->getAll();
        return $resultado;
    }


}

class PuestoDAO{

    public function getPuesto ($codigo_puesto){
        $conexion= new mysqli("localhost","root","","tp");
        $sql= "SELECT * FROM puesto where codigo_puesto='$codigo_puesto'"; 
        $resultado=$conexion->query($sql);
        if($resultado->num_rows()==1){
            $row=$resultado->fetch_assoc();
            $puesto= new Puesto($row["codigo_puesto"],$row["nombre"],$row["descripcion"],$row["id_empresa"]);
            $cuestionarioDAO=new cuestionarioDAO;
            $cuestionarios= $cuestionarioDAO->buscarCuestionarios($codigo_puesto);
            $puesto->setCuestionarios($cuestionarios);

        }
        $conexion->close();
        return $puesto; 
    }

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

    public function save(puesto $pu){
        $conexion = new mysqli("localhost","root","","tp");
        $codigo = $pu->getCodigo();
        $nombre = $pu->getNombre();
        $eliminado=0;
        $descripcion = $pu->getDescripcion();
        $id_empresa = $pu->getEmpresa()->getIdEmpresa();
        //guarda puesto, el for guarda las ponderaciones
        //mirar que la columna esta mal escrita en la base de datos 
        $query="INSERT INTO puesto (codigo_puesto, nombre,descripcion,eliminado,id_empresa) VALUES ('$codigo','$nombre','$descripcion','$eliminado','$id_empresa') ";
        $resultado = $conexion->query($query);
        if($resultado){
            $lista=$pu->getListaPonderacionCompetencia();
            $PonderacionCompetenciaDAO= new PonderacionCompetenciaDAO;
            for ($j=0; $j<count($lista);$j++ ){

                $PonderacionCompetenciaDAO->save($pu->getCodigo(), $lista[$j]);


            }
            header('Location:exito.php');
            //echo "lo ingreso el puesto a la base de datos";

        }
        else {//echo "no ingreso nada a la base de datos"
            header('Location:fracaso.php');
        }

    }

    public function buscarContiene($codigo,$nombre,$id_empresa){
        $resultado= array(); 
        if($id_empresa=="0"){$id_empresa="";}
        $conexion = new mysqli("localhost","root","","tp");
        $query= "SELECT codigo_puesto, nombre,id_empresa FROM puesto WHERE codigo_puesto like '%$codigo%' and nombre like '%$nombre%' and id_empresa like '%$id_empresa%'"; 
        $resultadoQuery= $conexion->query($query);
        while ($row=$resultadoQuery->fetch_assoc()){
            $puestoDTO = new PuestoDTO;
            $puestoDTO->setNombre($row["nombre"]);
            /*echo $puestoDTO->getNombre();*/
            $puestoDTO->setCodigo($row["codigo_puesto"]);
            $puestoDTO->setIdEmpresa($row["id_empresa"]);
            array_push($resultado, $puestoDTO);



}

     return $resultado; 

    }
    public function getAll(){
        $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT codigo_puesto,nombre,id_empresa from puesto";
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