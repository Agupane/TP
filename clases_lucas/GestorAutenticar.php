<?php

class GestorAuntenticar
{
	
	 public static $instancia;

    public static function getInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function validarNulidadYTipo(consultorDTO $consultor){
    	return(is_string($consultor->getUsuario()) && is_string($consultor->getContra()) &&
            !(is_null($consultor->getUsuario()) && is_null($consultor->getContra())));
    }

    public function getConsultor(consultorDTO $consultor){
        $buscar= new ConsultorDAO();
        $cons = $buscar->buscarConsultor($consultor->getUsuario());
        return $cons;

    }

   public function Ingresa($nombre, $contra){
       $ldap = new LDAP();
       return($ldap->ingresar($nombre,$contra));
   }

   public function Ingresar(ConsultorDTO $consultorDTO){

      if($this->validarNulidadYTipo($consultorDTO)){
           $consultor= $this->getConsultor($consultorDTO);
           if($consultor){
               if($this->Ingresa($consultorDTO->getUsuario(), $consultorDTO->getContra())){return true;}

               else {header('Location:index.php');}
           }


       }


   }


}