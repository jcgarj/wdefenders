<?php

namespace DsCorp\Personal\PersonalBundle\Entity;

/**
 * avisos
 */
class avisos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $aviso;


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
     * Set aviso
     *
     * @param string $aviso
     *
     * @return avisos
     */
    public function setAviso($aviso)
    {
        $this->aviso = $aviso;

        return $this;
    }

    /**
     * Get aviso
     *
     * @return string
     */
    public function getAviso()
    {
        return $this->aviso;
    }
}

