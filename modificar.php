<!DOCTYPE html>
<html>
<head>
	<title>Guardar</title>
</head>
<body>
	<center>
			<?php

				$id=$_REQUEST['id'];

				include("connect_db.php");

				$query="SELECT * FROM gestion_usuarios WHERE id='$id'";
				$resultado = $conexion -> query($query);
				$row=$resultado->fetch_assoc();
			?>

	<form action="modificar_proceso.php?id=<?php echo $row['id']; ?>" method="POST">
		<br><br><input type="text" REQUIRED name="usuario" placeholder="Usuario..." value="<?php echo $row['usuario'];?>"/> <br><br>
		<input type="text" REQUIRED name="nombre" placeholder="Nombre..." value="<?php echo $row['nombre'];?>" /> <br><br>
		<input type="text" REQUIRED name="apellido" placeholder="Apellido..." value="<?php echo $row['apellido'];?>" /> <br><br>
		<input type="password" REQUIRED name="password" placeholder="Contraseña..." value="<?php echo $row['password'];?>" /> <br><br>
		<input type="text" REQUIRED name="email" placeholder="Email..." value="<?php echo $row['email'];?>" /> <br><br>
		<input type="submit" value="Aceptar" />
	</form>
	</center>
</body>
</html>