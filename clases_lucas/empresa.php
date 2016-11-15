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

	public function getEmpresa( PuestoDTO $unDTO){
       $coso = null;
        $conexion = new mysqli("localhost","root","","tp");
        $query="select * from empresa";
        $resultado = $conexion -> query($query);
        if($resultado){
            return $resultado;
        }
        else{
            echo "Error";
        }
        $resultado->fetch_assoc();
        foreach ($resultado as $elemento){
                if ($elemento[0] = $unDTO->getCodigo()){
                    $coso = $elemento;
                }
        }
        if ($coso->is_null()){ echo "No existe el elemento";}
        else return $coso;
    }

}




?>