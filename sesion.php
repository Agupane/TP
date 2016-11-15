<!DOCTYPE html>
<html>
<head>
	<title>Sesion</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['u_usuario'])){
			echo "Sesion Exitosa\n Bienvenido";
			echo "<a href='cerrar_sesion.php'>Cerrar Sesion</a>";
		}
		else{
			header("Location: index.php");
		}
	?>
</body>
</html>