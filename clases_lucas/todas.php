<?php 
		class Cuestionario{
			private $clave;
			private $fechaInicio;
			private $fechaFinalizacion;
			private $cantIngreso;
			private $fechaUltimoIngreso;
			private $tiempoLimite;
			private $eliminado;
			private $puesto;
			private $candidato;
			private $estadoCuestionario = array("Activo","Incompleto","Completo","Sin contestar", "En proceso");
			private $puesto;
		}	
 		class PuestoCopia{
 			private $codigo;
 			private $nombre;
 			private $empresa;
 			private $descripcion;
 			private $listaCompetenciaCopia;
 		}
 		class CompetenciaCopia{
 			private $codigo;
 			private $nombre;
 			private $descripcion;
 			private $ponderacion;
 			private $puntaje;
 			private $PuestoCopia;
 			private $listaFactorCopia;
 		}
 		class FactorCopia{
 			private $codigo;
 			private $string;
 			private $descripcion;
 			private $orden;
 			private $puntaje;
 			private $preguntaCopia1;
 			private $preguntaCopia2;
 		}
 		class PreguntaCopia{
 			private $id;
 			private $nombre;
 			private $pregunta;
 			private $bloque
 			private $descripcion;
 			private $listaRespuestaCopia;
 		}
 		class RespuestaCopia{
 			private $id;
 			private $nombre;
 			private $descripcion;
 			private $ponderacion;
 			private $elegido;
 			private $preguntaCopia;
 		}
 		class RegistroAuditoria{
 			private $fecha;
 			private $hora;
 			private $objetoBorrado;
 		}
 		class Persona{
 			protected $apellido;
 			protected $nombre;
 			protected $numDocumento;
 			protected $fecha_nac;
 			protected $nacionalidad;
 			protected $eliminado;
 			protected $email;
 			protected $genero = array("H", "M");
 			protected $tipoDocumento = array("DNI", "LC", "LE", "CUIT", "PASAPORTE" );
 		}
 		class Consultor extends Persona{
 			private $nombre_usuario;
 			private $passowrd;
 			private $listaAuditorias;
 		}
 		class Candidato extends Persona{
 			private $numCandidato;
 			private $clave;
 			private $escolaridad;
 		}
 		
 		class Puesto{
 			private $codigo;
 			private $nombre;
 			private $eliminado
 			private $empresa;
 			private $descripcion;
 			private $listaponderacionCompetencia;
 			private $cuestionario;

 		}
 		class PonderacionCompetencia{
 			private $ponderacion
 			private $Competencia
 		}
 		class Competencia{
 			private $codigo
 			private $nombre
 			private $descripcion
 			private $listaFactor
 		}
 		class Factor{
 			private $codigo
 			private $nombre
 			private $descripcion
 			private $orden 
 			private $eliminado
 			private $competencia
 		}
 		class Pregunta {
 			private $Id
 			private $nombre
 			private $pregunta
 			private $descripcion
 			private $eliminado
 			private $factor
 			private $opcRespuesta
 			private $listaPonderacionRespuesta
 		}
 		class PonderacionPregunta{
 			private $ponderacion
 			private $listaRespuesta
 		}
 		class Respuesta {
 			private $Id
 			private $nombre
 			private $descripcion
 			private $orden
 			private $opcionesRespuesta;
 		}
 		class OpcionRespuesta{
 			private $Id
 			private $nombre
 			private $descripcion
 			private $eliminado
 			private $respuesta
 		}
 		class Empresa{
 			private $nombre;
 			private $direccion;
 			private $tipo;
 			private $localidad;
 			private $pais;
 			private $cp;

 		}
 		class UsuarioConsultorDTO{
 			private $nombre_usuario;
 			private $clave;
 		}
 		class UsuarioCandidatoDTO{
 			private $tipoDocumento = array("DNI", "LC", "LE", "CUIT", "PASAPORTE" );
 			private $numDocumento;
 			private $clave;
 		}
 		class PuestoDTO{
 			private $codigo;
 			private $nombre;
 			private $empresa;
 			private $descripcion;
 			private $caracteristicasPuesto;
 		}
 		class CaractPuesto{
 			private $seleccionado;
 			private $competencia;
 			private $ponderacion // va de 1 a 10, ver en db o en el codigo;
 		}
 		class PreguntaDTO{
 			private $competencia;
 			private $factor;
 			private $nombre;
 			private $pregunta;
 			private $descripcion;
 			private $opcRespuesta;
 			private $listartas;
 		}
 		
 		class ListaRtas{
 			private $orden;
 			private $respuesta;
 			
 		}
 		class CandidatoDTO{
 			private $nombre;
 			private $apellido;
 			private $numCandidato;
 			private $listaCandidatos;
 			private $listaSeleccionados;
 		}
 		class EvaluarCandidatoDTO{
 			private $listaSeleccionados;
 			private $funcion;
 			private $empresa;
 		}
 		class CuestionarioDTO{
 			
 		}
 ?>