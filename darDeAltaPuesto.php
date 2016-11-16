<?php 
require ("clases_lucas/puesto.php");


$competenciaPonderacion=array(); 

/* Muestra el arreglo 
for ($j=0; $j<count($competenciaPonderacion);$j++ ){
	echo $competenciaPonderacion[$j][0]. "->" . $competenciaPonderacion[$j][1];
}*/



$codigo = $nombre = $empresa = $descripcion = $caracteristicasPuestos = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$unPuestoDTO = new PuestoDTO;
	$unPuestoDTO->setCodigo($_POST["codigo"]);
	$unPuestoDTO->setNombre($_POST["nombre"]);
	$unPuestoDTO->setIdEmpresa($_POST["id_empresa"]);
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


	//$GestorPuesto = GestorPuesto::getInstancia();
	//$GestorPuesto->guardar($unPuestoDTO);
	
}





?>