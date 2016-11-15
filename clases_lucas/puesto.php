<?php
class Puesto{

    private $codigo;
    private $empresa;
    private $descripcion;
    private $listaponderacionCompetencia;
    private $cuestionario;
    private $nombre;
    private $eliminado;

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getEliminado()
    {
        return $this->eliminado;
    }
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;
    }
    public function getEmpresa()
    {
        return $this->empresa;
    }
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getListaponderacionCompetencia()
    {
        return $this->listaponderacionCompetencia;
    }
    public function setListaponderacionCompetencia($listaponderacionCompetencia)
    {
        $this->listaponderacionCompetencia = $listaponderacionCompetencia;
    }
    public function getCuestionario()
    {
        return $this->cuestionario;
    }
    public function setCuestionario($cuestionario)
    {
        $this->cuestionario = $cuestionario;
    }

 		}
class PuestoDTO{
    private $codigo;
    private $nombre;
    private $empresa;
    private $descripcion;
    private  $competencias;
    private $ponderacion;

    public function getPonderacion()
    {
        return $this->ponderacion;
    }
    public function setPonderacion($ponderacion)
    {
        $this->ponderacion = $ponderacion;
    }
    public function getCompetencias()
    {
        return $this->competencias;
    }
    public function setCompetencias($competencias)
    {
        $this->competencias = $competencias;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getEmpresa()
    {
        return $this->empresa;
    }
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }



 		}
class GestorPuesto{


	public function getAllEmpresas(){
	$empresaDAO = new empresaDAO;
	$resultado = $empresaDAO->getAll();
	return $resultado;

	}
    public function ValidarNulidadYTipo( PuestoDTO $unDto){
        return($unDto->getNombre()->is_string() &&
                $unDto->getCodigo()->is_int() &&
                $unDto->getDescripcion()->is_string() &&
                $unDto->getEmpresa()->is_string() &&
                $unDto->getCaracteristicasPuesto()->is_string() &&
           !($unDto->getNombre()->is_null() &&
            $unDto->getCodigo()->is_null() &&
            $unDto->getDescripcion()->is_null() &&
            $unDto->getEmpresa()->is_null() &&
            $unDto->getCaracteristicasPuesto()->is_null())
                );
    }
    public function ValidarNombre(PuestoDTO $unDTO){
        $valido = new PuestoDAO();
        return($valido->ValidarNombre($unDTO));
        // retorna true si ya existe uno y false si no existe;
    }
    public function getEmpresa(PuestoDTO $unDTO){
        $emp = new EmpresaDAO();
        $emp->getEmpresa($unDTO);
        return $emp;
    }
    public function  New(PuestoDTO $unDTO){
        $puesto = new Puesto();
        $puesto->setCodigo($unDTO->getCodigo());
        $puesto->setNombre($unDTO->getNombre());
        $puesto->setEmpresa($unDTO->getEmpresa($unDTO));
        $puesto->setCuestionario(null);
        $puesto->setDescripcion($unDTO->getDescripcion());
        $puesto->setEliminado(false);
        $puesto->setListaponderacionCompetencia(null);
        return $puesto;

    }
    public function getCompetencia ( $algo){
        $competencia = new competencia();
        $competencia->getCompetenciaa($algo);
        return $competencia;
    }
    public  function  crearPonderacion ($algo,$otraCosa){
        $pond = new PonderacionCompetencia();
        $pond->setCompetencia($algo);
        $pond->setPonderacion($otraCosa);
        return $pond;
    }
    public function Guardar(PuestoDTO $unDTO){
        $nuevoPuesto = null;
            if( $this->ValidarNulidadYTipo($unDTO) &&
                !$this->ValidarNombre($unDTO->)) {


                $nuevoPuesto->New($unDTO);
                $i = 0;
                while (!$unDTO->getCompetencias()->next()->is_null()) {
                    $comp = $this->getCompetencia($unDTO->getCompetencias()->get($i)->get(0));
                    $pond = $this->crearPonderacion($comp, $this->setCompetencia($unDTO->getCompetencias()->get($i)->get(1)));
                    $nuevoPuesto->getlistaCompetencia()->add($pond);
                }
                $this->save($nuevoPuesto);
            }
            else if (!$this->ValidarNulidadYTipo($unDTO)){echo "Datos Invalidos";}
                    else echo "El nombre ya existe";


    }



}

class PuestoDAO{

    public function ValidarNombre(PuestoDTO $unDTO){
        $flag = false;
        $base = new connect_db;
        $sql = "SELECT nombre FROM puesto";
        $resultado = $base->query($sql);
        foreach ($resultado as $elemento){
            if($elemento = $unDTO->getNombre()){
                $flag = true;
            }
        }
        return($flag);
        $base->close();
    }
    public function Save($pu){
        $conexion = new mysqli("localhost","root","","tp");
        $codigo = $pu->getCodigo();
        $nombre = $pu->getNombre();
        $eliminado = false;
        $empresa = $pu->getEmpresa();
        $descripcion = $pu->getDescripcion();
        $cuestionario = $pu->getCuestionario();

        $query="INSERT INTO puesto(id_empresa, nombre, descripcion, codigo_puesto, eliminado, id_registroAuditoria) 
                VALUES ($empresa, $nombre,$descripcion, $codigo, $eliminado, NULL )";
        $resultado = $conexion -> query($query);


    }
}
?>