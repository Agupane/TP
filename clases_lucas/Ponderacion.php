<?php

/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/14/16
 * Time: 10:59
*/

class PonderacionCompetencia{
    private $ponderacion;
    private $Competencia;

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
    public function setPonderacion($ponderacion)
    {
        $this->ponderacion = $ponderacion;
    }

    /**
     * @return mixed
     */
    public function getCompetencia()
    {
        return $this->Competencia;
    }

    /**
     * @param mixed $Competencia
     */
    public function setCompetencia($Competencia)
    {
        $this->Competencia = $Competencia;
    }
 		}

/**
* 
*/
class PonderacionCompetenciaDAO 
{
    //recibe una ponderacionCompetencia y la guarda 
    public function save($codigo_puesto, PonderacionCompetencia $PonderacionCompetencia){

        $codigo_competencia=$PonderacionCompetencia->getCompetencia()->getCodigo();
        $pond=$ponderacionCompetencia->getPonderacion();

        $conexion = new mysqli("localhost","root","","tp");
        $query="INSERT into ponderacionCompetencia VALUES ($codigo_competencia,$codigo_puesto,$pond)";

        $resultado = $conexion->query($query);
        if($resultado){
            return ;
    }
        else{
        echo "Error";
    }

    }

}