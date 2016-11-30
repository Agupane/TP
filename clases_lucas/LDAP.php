<?php

/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/25/16
 * Time: 14:06
 */
class GestorLDAP
{
    public function ingresar($nombre, $pass){


            $conexion = new mysqli("localhost","root","","tp");
            $query="SELECT * from LDAP where User = '$nombre'";
            $resultado = $conexion -> query($query);
            $row = $resultado->fetch_assoc();
            if($resultado){
                $contra = $row['Password'];
                if($contra == $pass){
                    return true;
                }
                else
                    return false;



            }
            else{
                echo "Error";
            }



    }


}