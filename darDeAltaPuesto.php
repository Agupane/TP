<?php 
require ("clases_lucas/puesto.php");


$competenciaPonderacion=array(); 
$i=0;

foreach ($_POST['pond'] as $pond) {
    
    if($pond!= 0){
    	$competenciaPonderacion[$i][0]= $_POST['competencia'][$i];
    	$competenciaPonderacion[$i][1]= $pond;
    	$i++;

    }
};



$codigo = $nombre = $empresa = $descripcion = $caracteristicasPuestos = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$unPuestoDTO = new PuestoDTO;
	$unPuestoDTO->setCodigo($_POST["codigo"]);
	$unPuestoDTO->setNombre($_POST["nombre"]);
	$unPuestoDTO->setEmpresa($_POST["id_empresa"]);
	$unPuestoDTO->setDescripcion($_POST["descripcion"]);
	$unPuestoDTO->setCaracteristicasPuesto($_POST["caracteristicas"]);

	$GestorPuesto = GestorPuesto::getInstancia();
	$GestorPuesto->guardar($unPuestoDTO);
	
}





?>