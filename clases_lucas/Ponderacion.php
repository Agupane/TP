<?php

/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/14/16
 * Time: 10:59
*/

class PonderacionCompetencia{
    private $ponderacion;
    private $competencia;

    //recibe una compentecia (instancia) y una ponderacion (int)
    public function __construct(competencia $competencia,$ponderacion){
        $this->ponderacion= $ponderacion;
        $this->competencia=$competencia;
        }
    /**
     * @return mixed
     */
    public function getPonderacion()
    {
        return $this->ponderacion;
    }

    /**
     * @param mixed $ponderacion
     */

    public function getCompetencia(){
        return $this->competencia;
    }
    public function setPonderacion($ponderacion)
    {
        $this->ponderacion = $ponderacion;
    }

    /**
     * @return mixed
     */
    public function getNombreCompetencia()
    {
        return $this->competencia->getNombre();
    }

    /**
     * @param mixed $Competencia
     */
    public function setCompetencia($competencia)
    {
        $this->competencia = $competencia;
    }
 		}

/**
* 
*/
class PonderacionCompetenciaDAO 
{
    //recibe una ponderacionCompetencia y la guarda 
    public function save($codigo_puesto, PonderacionCompetencia $ponderacionCompetencia){

        $codigo_competencia=$ponderacionCompetencia->getCompetencia()->getCodigo();
        $pond=$ponderacionCompetencia->getPonderacion();
        $conexion = new mysqli("localhost","root","","tp");
        $query="INSERT into ponderacionCompetencia VALUES ('$codigo_competencia','$codigo_puesto','$pond')";

        $resultado = $conexion->query($query);
        if($resultado){
            $conexion->close();
            return "se inserto una pondercion";
    }
        else{
        echo "Error";
    }

    }

}