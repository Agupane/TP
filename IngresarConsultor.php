<?php
/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/25/16
 * Time: 16:10
 */

require ("connect_db.php");
require ("clases_lucas/LDAP.php");
require ("clases_lucas/GestorAutenticar.php");
require ("clases_lucas/consultor.php");


$competenciaPonderacion=array();

/* Muestra el arreglo
for ($j=0; $j<count($competenciaPonderacion);$j++ ){
	echo $competenciaPonderacion[$j][0]. "->" . $competenciaPonderacion[$j][1];
}*/



$nombre = $contrase= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $unConsultorDTO = new ConsultorDTO();
    $unConsultorDTO->setUsuario($_POST["usuario"]);
    $unConsultorDTO->setContra($_POST["password"]);


    $GestorAutenticar = GestorAuntenticar::getInstancia();
    $GestorAutenticar->Ingresar($unPuestoDTO);

}
