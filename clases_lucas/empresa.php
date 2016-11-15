<?php

class Empresa{
 			private $nombre;
 			private $direccion;
 			private $tipo;
 			private $localidad;
 			private $pais;
 			private $cp;


     public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
         public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }
         public function setPais($pais)
    {
        $this->pais = $pais;
    }
         public function setCp($cp)
    {
        $this->cp = $cp;
    }





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


	public function getEmpresa($id_empresa){

        $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT * FROM empresa WHERE id_empresa=$id_empresa";
        $resultado = $conexion -> query($query);
        $row = $resultado->fetch_assoc();
        if($resultado){
            $empresa=new empresa();
            $empresa->setNombre($row['nombre']);
            $empresa->setDireccion($row['direccion']);
            $empresa->setLocalidad($row['localidad']);
            $empresa->setPais($row['pais']);
            $empresa->setTipo($row['tipo']);
            $empresa->setCp($row['cp']);

        }
        else{
            return "Error";
        }
        
        return $empresa;    

    }

}




?>