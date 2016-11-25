<?php 
 		class RegistroAuditoria{
 			private $fecha;
 			private $hora;
 			private $objetoBorrado;
 			private $id_consultor;

 			public function __construct($objeto,$fecha,$hora,$id_consultor){
 				$this->fecha=$fecha;
 				$this->hora=$hora;
 				$this->id_consultor=$id_consultor;
 				$this->objetoBorrado=$objeto;
		    }
 		}

?>