<?php

include("connect_db.php");
	$id=$_REQUEST['id'];

	$query ="DELETE FROM gestion_usuarios WHERE id='$id'";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("Location: tabla.php");
	}
	else{
		echo "Insercion denegada";
	}

?>