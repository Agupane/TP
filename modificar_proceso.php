<?php

include("connect_db.php");
	$id=$_REQUEST['id'];
	$usuario = $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$query ="UPDATE gestion_usuarios SET usuario='$usuario',nombre='$nombre',apellido='$apellido',password='$password',email='$email' WHERE id='$id'";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("Location: tabla.php");
	}
	else{
		echo "Insercion denegada";
	}

?>