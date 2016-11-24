<?php

class Empresa{
 			private $nombre;
 			private $direccion;
 			private $tipo;
 			private $localidad;
 			private $pais;
 			private $cp;
 		}

class EmpresaDAO {
	public function getAll(){
		$conexion = new mysqli("localhost","root","","tp");
		$query="select id_empresa,nombre from empresa";
		$resultado = $conexion -> query($query);
		if($resultado){
			return $resultado;
	}
		else{
		echo "Error";
	}
	}
}




?>