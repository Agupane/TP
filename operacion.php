<?php

include("connect_db.php");

	$usuario = $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$password = $_POST['password'];
	$verificaPass = $_POST['repassword'];
	$email = $_POST['email'];
	$permiso = -1;
    /*$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));*/

    /*$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384; //16mb es el limite de medium blob
     
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
     
        //este es el archivo temporal
        $imagen_temporal  = $_FILES['imagen']['tmp_name'];  
        //este es el tipo de archivo
        $tipo = $_FILES['imagen']['type'];
        //leer el archivo temporal en binario
        $fp     = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //escapar los caracteres
        $data = mysql_escape_string($data);
}

	*/$query ="INSERT INTO gestion_usuarios(usuario,nombre,apellido,password,email,permiso) VALUES('$usuario','$nombre','$apellido','$password','$email','$permiso')";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("Location: espera.php");
	}
	else{
		echo "Insercion denegada";
	}

?>