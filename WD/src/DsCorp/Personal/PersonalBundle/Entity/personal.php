<?php

namespace DsCorp\Personal\PersonalBundle\Entity;

/**
 * personal
 */
class personal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apePat;

    /**
     * @var string
     */
    private $apeMat;

    /**
     * @var string
     */
    private $telefono1;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     */
    private $dechaModificacion;

    /**
     * @var integer
     */
    private $idCreacion;

    /**
     * @var integer
     */
    private $idModificacion;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return personal
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apePat
     *
     * @param string $apePat
     *
     * @return personal
     */
    public function setApePat($apePat)
    {
        $this->apePat = $apePat;

        return $this;
    }

    /**
     * Get apePat
     *
     * @return string
     */
    public function getApePat()
    {
        return $this->apePat;
    }

    /**
     * Set apeMat
     *
     * @param string $apeMat
     *
     * @return personal
     */
    public function setApeMat($apeMat)
    {
        $this->apeMat = $apeMat;

        return $this;
    }

    /**
     * Get apeMat
     *
     * @return string
     */
    public function getApeMat()
    {
        return $this->apeMat;
    }

    /**
     * Set telefono1
     *
     * @param string $telefono1
     *
     * @return personal
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    /**
     * Get telefono1
     *
     * @return string
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return personal
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return personal
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set dechaModificacion
     *
     * @param \DateTime $dechaModificacion
     *
     * @return personal
     */
    public function setDechaModificacion($dechaModificacion)
    {
        $this->dechaModificacion = $dechaModificacion;

        return $this;
    }

    /**
     * Get dechaModificacion
     *
     * @return \DateTime
     */
    public function getDechaModificacion()
    {
        return $this->dechaModificacion;
    }

    /**
     * Set idCreacion
     *
     * @param integer $idCreacion
     *
     * @return personal
     */
    public function setIdCreacion($idCreacion)
    {
        $this->idCreacion = $idCreacion;

        return $this;
    }

    /**
     * Get idCreacion
     *
     * @return integer
     */
    public function getIdCreacion()
    {
        return $this->idCreacion;
    }

    /**
     * Set idModificacion
     *
     * @param integer $idModificacion
     *
     * @return personal
     */
    public function setIdModificacion($idModificacion)
    {
        $this->idModificacion = $idModificacion;

        return $this;
    }

    /**
     * Get idModificacion
     *
     * @return integer
     */
    public function getIdModificacion()
    {
        return $this->idModificacion;
    }
}

