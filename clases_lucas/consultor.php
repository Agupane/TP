<?php 
require ("Persona.php");



class Consultor extends Persona
{
	private $nombre_usuario;
    private $listaRegistrosAuditoria;

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * @param mixed $nombre_usuario
     */
    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    private $password;
    private $id;

    public function __construct($codigo,$nombre,$descripcion,$empresa,$nombre_usuario,$id){
        $this->codigo= $codigo;
        $this->nombre= $nombre;
        $this->eliminado = false;
        $this->descripcion = $descripcion;
        $this->empresa = $empresa;
        $this->listaPonderacionCompetencia=array();
        $this->cuestionarios=null;
        $this->nombre_usuario = $nombre_usuario;
        $this->id = $id;


    }
}


class ConsultorDTO
{
	private $usuario;

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @param mixed $contra
     */
    public function setContra($contra)
    {
        $this->contra = $contra;
    }
	private $contra;
    private  $nombre;

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

	public function getUsuario(){
		return $this->usuario;
	}

	public function getContra(){
		return $this->contra;
	}
}

class ConsultorDAO
{

    public function getConsultor($id_consultor){

        $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT * FROM consultor WHERE id_consultor='$id_consultor'";
        $resultado = $conexion -> query($query);
        $row = $resultado->fetch_assoc();
        if($resultado){
            $consultor = new Consultor();
            $consultor->setId($row['id_consultor']);
            $consultor->setApellido($row['apellido']);
            $consultor->setNombre($row['nombre']);
            $consultor->setDoc($row['num_dni']);
            $consultor->setEmail($row['email']);
            $registroDAO= new RegistroAuditoriaDAO;
            $consultor->setRegistrosAuditoria($registroDAO->getRegistrosDeConsultor($id_consultor));


        }
        else{
            return "Error";
        }
        $conexion->close();        
        return $consultor;

    }    


	public function buscarConsultor($nombre){

        $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT * FROM consultor WHERE nombre='$nombre'";
        $resultado = $conexion -> query($query);
        $row = $resultado->fetch_assoc();
        if($resultado){
            $consultor = new Consultor();
            $consultor->setId($row['id_consultor']);
            $consultor->setApellido($row['apellido']);
            $consultor->setNombre($row['nombre']);
            $consultor->setDoc($row['num_dni']);
            $consultor->setEmail($row['email']);

        }
        else{
            return "Error";
        }
        $conexion->close();        
        return $consultor;

    }
}