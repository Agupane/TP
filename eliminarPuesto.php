<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$GestorPuesto= GestorPuesto::getInstancia();
	$GestorPuesto->eliminarPuesto($_POST["codigo_puesto"], $_SESSION["id"] );
	



}


?>