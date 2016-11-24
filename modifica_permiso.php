<?php

include("connect_db.php");
	$id=$_REQUEST['id'];
	$permiso = 1;

	$query ="UPDATE gestion_usuarios SET permiso='$permiso' WHERE id='$id'";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("Location: tabla.php");
	}
	else{
		echo "Modificacion denegada";
	}

?>