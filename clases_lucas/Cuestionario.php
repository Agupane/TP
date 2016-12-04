<?php

/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/30/16
 * Time: 23:05
 */
class Cuestionario
{
    private $id;
    private $clave;
    private $fecha_inicio;
    private $fecha_fin;
    private $ultimo_ingreso;
    private $cantidad_ingresos;
    private $tiempo_limite;
    private $eliminado;
    private $id_puesto;
    private $id_candidato;
    private $id_auditoria;

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

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * @return mixed
     */
    public function getUltimoIngreso()
    {
        return $this->ultimo_ingreso;
    }

    /**
     * @param mixed $ultimo_ingreso
     */
    public function setUltimoIngreso($ultimo_ingreso)
    {
        $this->ultimo_ingreso = $ultimo_ingreso;
    }

    /**
     * @return mixed
     */
    public function getCantidadIngresos()
    {
        return $this->cantidad_ingresos;
    }

    /**
     * @param mixed $cantidad_ingresos
     */
    public function setCantidadIngresos($cantidad_ingresos)
    {
        $this->cantidad_ingresos = $cantidad_ingresos;
    }

    /**
     * @return mixed
     */
    public function getTiempoLimite()
    {
        return $this->tiempo_limite;
    }

    /**
     * @param mixed $tiempo_limite
     */
    public function setTiempoLimite($tiempo_limite)
    {
        $this->tiempo_limite = $tiempo_limite;
    }

    /**
     * @return mixed
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

    /**
     * @param mixed $eliminado
     */
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;
    }

    /**
     * @return mixed
     */
    public function getIdPuesto()
    {
        return $this->id_puesto;
    }

    /**
     * @param mixed $id_puesto
     */
    public function setIdPuesto($id_puesto)
    {
        $this->id_puesto = $id_puesto;
    }

    /**
     * @return mixed
     */
    public function getIdCandidato()
    {
        return $this->id_candidato;
    }

    /**
     * @param mixed $id_candidato
     */
    public function setIdCandidato($id_candidato)
    {
        $this->id_candidato = $id_candidato;
    }

    /**
     * @return mixed
     */
    public function getIdAuditoria()
    {
        return $this->id_auditoria;
    }

    /**
     * @param mixed $id_auditoria
     */
    public function setIdAuditoria($id_auditoria)
    {
        $this->id_auditoria = $id_auditoria;
    }
}

class GestorCuestionario{

  

    public function cuestionarioActivo( $id_candidato){
        $can = $this->getCandidato($id_candidato);
        $cuestionario = new Cuestionario();
        $cue = $cuestionario->getCuestionario($can->getIdCuestionario());
        return $cue;
    }

    public function validarClave ($clave, $cuestionario){
        $cuest = new Cuestionario();
        $cue = $cuest->getCuestionario($clave);
        if($cuestionario->getId() == $cue->getId()){return true;}
    }



}

class CuestionarioDTO{

    public function getCuestionario($id_cuestionario){

        $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT * FROM cuestionario WHERE id_cuestionario='$id_cuestionario'";
        $resultado = $conexion -> query($query);
        $row = $resultado->fetch_assoc();
        if($resultado){
            $cuestionario = new Cuestionario();
            $cuestionario->setId($row['id_cuestionario']);
            $cuestionario->setClave($row['clave']);
            $cuestionario->setIdCandidato($row['id_candidato']);
         /*   $cuestionario->setApellido($row['apellido']);
            $cuestionario->setNombre($row['nombre']);
            $cuestionario->setDoc($row['num_dni']);
            $cuestionario->setEmail($row['email']);
            $registroDAO= new RegistroAuditoriaDAO;
            $cuestionario->setRegistrosAuditoria($registroDAO->getRegistrosDeConsultor($id_consultor));*/


        }
        else{
            return "Error";
        }
        $conexion->close();
        return $cuestionario;


    }

}