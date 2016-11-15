<?php

include("connect_db.php");

$nombreImagen = $_POST['nombreImagen'];
$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$query = "INSERT INTO gestion_usuarios(nombreImagen,Imagen) VALUES('$nombreImagen','$Imagen')";
$resultado = $conexion -> query($query);

if($resultado){
	echo "Si se inserto";
}
else{
	echo "No se inserto";
}



?>