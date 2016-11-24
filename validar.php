
<?php
	
	
	session_start();

	$username=$_POST['usuario'];
	$pass=$_POST['password'];

	include("connect_db.php");

	$validar = $conexion->query("SELECT * FROM gestion_usuarios WHERE usuario='$username' AND password='$pass' ");

	if($resultado = mysqli_fetch_array($validar)){
		$_SESSION['id'] = $resultado[0];
		$_SESSION['usuario'] = $username;
		$_SESSION['nombre'] = $resultado[2];
		$_SESSION['apellido'] = $resultado[3];
		$_SESSION['email'] = $resultado[8];
		$_SESSION['permiso'] = $resultado[9];
		header("Location: tabla.php"); 

	}
	else{
		echo "<script>alert('Login incorrecto')</script>"; 
		header("Location: index.php");
	}

?>