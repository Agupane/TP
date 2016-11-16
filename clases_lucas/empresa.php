<?php

class Empresa{
            private $id_empresa;
 			private $nombre;
 			private $direccion;
 			private $tipo;
 			private $cp;
    public function setId($id_empresa){
        $this->id_empresa=$id_empresa;
    }
    public function getNombre(){
        return $this->nombre;
    }      
     public function getIdEmpresa(){

        /*$resultado= $this->id_empresa;
        $id=(int)$resultado;*/
        return $this->id_empresa;
     }
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


	public function buscarEmpresa($id_empresa){

        $conexion = new mysqli("localhost","root","","tp");
        $query="SELECT * FROM empresa WHERE id_empresa=$id_empresa";
        $resultado = $conexion -> query($query);
        $row = $resultado->fetch_assoc();
        if($resultado){
            $empresa=new empresa();
            $empresa->setId($row['id_empresa']);
            $empresa->setNombre($row['nombre']);
            $empresa->setDireccion($row['direccion']);
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