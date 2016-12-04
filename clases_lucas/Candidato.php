<?php

/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/30/16
 * Time: 10:33
 */

class Candidato extends Persona{
    private $id_candidato;
    private $escolaridad;
    private $id_cuestionario;

    /**
     * @return mixed
     */


    public function getIdCuestionario()
    {
        return $this->id_cuestionario;
    }

    /**
     * @param mixed $id_cuestionario
     */
    public function setIdCuestionario($id_cuestionario)
    {
        $this->id_cuestionario = $id_cuestionario;
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
    public function getEscolaridad()
    {
        return $this->escolaridad;
    }

    /**
     * @param mixed $escolaridad
     */
    public function setEscolaridad($escolaridad)
    {
        $this->escolaridad = $escolaridad;
    }

}

class CandidatoDTO{
    private $id_candidato;
    private $clave;

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



}

class GestorCandidato{
 public function cuestionarioActivo( $id_candidato){
     $can = $this->getCandidato($id_candidato);
     $cuestionario = new Cuestionario();
     $cue = $cuestionario->getCuestionario($can->getIdCuestionario());
     return $cue;
 }

 public function validarClave ($clave, $cuestionario){
     $cuest = new Cuestionario();
     $cue = $cuest->getCuestionario($clave);
    if($cuestionario->getID() == $cue->getID()){return true;}
 }

}


class CandidatoDAO
{
    public function getCandidato($id_candidato){

        $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT * FROM candidato WHERE id_candidato='$id_candidato'";
        $resultado = $conexion -> query($query);
        $row = $resultado->fetch_assoc();
        if($resultado){
            $candidato = new Candidato();
            $candidato->setIdCandidato($row['id_candidato']);
            $candidato->setApellido($row['apellido']);
            $candidato->setNombre($row['nombre']);
            $candidato->setDoc($row['num_dni']);
            $candidato->setEmail($row['email']);
           /* $registroDAO= new RegistroAuditoriaDAO;
            $candidato->setRegistrosAuditoria($registroDAO->getRegistrosDeConsultor($id_consultor));*/


        }
        else{
            return "Error";
        }
        $conexion->close();
        return $candidato;

    }



}