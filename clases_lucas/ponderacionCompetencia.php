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

    //recibe una competecia (instancia) y una ponderacion (int)
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
            return "se inserto una ponderacion";
    }
        else{
        echo "Error";
    }

    }

    public function getPonderacionCompetencias($codigo_puesto){
        $conexion= new mysqli("localhost","root","","tp");
        $query= "SELECT * FROM ponderacionCompetencia where codigo_puesto='$codigo_puesto'";
        $resultado=$conexion->query($query);
        $competenciaDAO= new CompetenciaDAO;
        $listaPonderacionCompetencia=array();
        while ($row=$resultado->fetch_assoc()){
            $competencia=$competenciaDAO->getCompetencia($row["codigo_competencia"]);
            $po=new PonderacionCompetencia($competencia,$row["ponderacion"]);
            $listaPonderacionCompetencia[]=$po;
            

        }
        $conexion->close();
        return $listaPonderacionCompetencia;

    }

    public function deleteAllPuesto($codigo_puesto){
        $conexion= new mysqli("localhost","root","","tp");
        $query= "DELETE FROM ponderacionCompetencia where codigo_puesto='$codigo_puesto'";
        $resultado=$conexion->query($query);
        if($resultado){
            $conexion->close();
            return true;            
        }

    }
}