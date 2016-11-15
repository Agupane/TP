<?php

/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/14/16
 * Time: 10:59
 */
class Ponderacion
{

}

class PonderacionCompetencia{
    private $ponderacion;
    private $Competencia;


  public  function  __construct ($codigo_competencia,$ponderacion){
        
        $GestorCompetencia=GestorCompetencia::getInstancia();
        $Competencia=$GestorCompetencia->getCompetencia($codigo_competencia);
        $this->Competencia=$Competencia;
        $this->ponderacion=$ponderacion;
        return $this;
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