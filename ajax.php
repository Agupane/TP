<?php 
if($_POST['action'] == 'call_this') {
  $conexion = new mysqli("localhost","root","","tp");
  $resultado = $conexion->query('SELECT nombre FROM empresa WHERE id=1');
  $row=$resultado->fetch_assoc();
  echo $row;
}

?>