<?php

require ("clases_lucas/puesto.php");
require ("clases_lucas/empresa.php");
require ("clases_lucas/competencia.php");
require ("clases_lucas/ponderacionCompetencia.php");
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$unPuestoDTO = new PuestoDTO;
	$unPuestoDTO->setCodigo($_POST["codigo"]);
	$unPuestoDTO->setNombre($_POST["nombrePuesto"]);
	$unPuestoDTO->setIdEmpresa($_POST["empresa"]);
	$unPuestoDTO->setDescripcion($_POST["descripcion"]);
	
	$i=0;


	foreach ($_POST['pond'] as $pond) {
    
    if($pond!= 0){
    	$competenciaPonderacion[$i][0]= $_POST['competencia'][$i];
    	$competenciaPonderacion[$i][1]= $pond;
    	$i++;

    }
}

	$unPuestoDTO->setCaracteristicasPuesto($competenciaPonderacion);
	$GestorPuesto=GestorPuesto::getInstancia();

	$GestorPuesto->modificarPuesto($unPuestoDTO);

}

?>