<?php

/**
 * Created by PhpStorm.
 * User: lucasniklison
 * Date: 11/24/16
 * Time: 16:50
 */
class Persona
{
    protected $apellido;
    protected $nombre;
    protected $doc;
    protected  $fecha_nac;
    protected  $nacionalidad;
    protected  $email;
    protected  $tipo;

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function __construct($apellido, $nombre,$doc,$fecha_nac, $nacionalidad, $email, $tipo){
        $this->apellido = $apellido;
        $this->nombre=$nombre;
        $this->doc=$doc;
        $this->fecha_nac=$fecha_nac;
        $this->nacionalidad=$nacionalidad;
        $this->email=$email;
        $this->tipo = $tipo;

    }


    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * @param mixed $doc
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;
    }

    /**
     * @return mixed
     */
    public function getFechaNac()
    {
        return $this->fecha_nac;
    }

    /**
     * @param mixed $fecha_nac
     */
    public function setFechaNac($fecha_nac)
    {
        $this->fecha_nac = $fecha_nac;
    }

    /**
     * @return mixed
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * @param mixed $nacionalidad
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }




}