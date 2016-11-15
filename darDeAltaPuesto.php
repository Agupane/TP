<?php 
require ("puesto.php");


$codigo = $nombre = $empresa = $descripcion = $caracteristicasPuestos = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$unPuestoDTO = new PuestoDTO;
	$unPuestoDTO->setCodigo($_POST["codigo"]);
	$unPuestoDTO->setNombre($_POST["nombre"]);
	$unPuestoDTO->setEmpresa($_POST["id_empresa"]);
	$unPuestoDTO->setDescripcion($_POST["descripcion"]);
	$unPuestoDTO->setCaracteristicasPuesto($_POST["caracterisitcas"]);

	$GestorPuesto = GestorPuesto::getInstancia();
	$GestorPuesto->guardar($unPuestoDTO);
	
}
/*
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/





?>