<?php
class Puesto{
 			private $codigo;
 			private $nombre;
 			private $eliminado;
 			private $empresa;
 			private $descripcion;
 			private $listaponderacionCompetencia;
 			private $cuestionario;
 		}
class PuestoDTO{
 			private $codigo;
 			private $nombre;
 			private $empresa;
 			private $descripcion;
 			private $caracteristicasPuesto;
 		}


class GestorPuesto{


	public function getAllEmpresas(){
	$empresaDAO = new empresaDAO;
	$resultado = $empresaDAO->getAll();
	return $resultado;

	}
}
?>