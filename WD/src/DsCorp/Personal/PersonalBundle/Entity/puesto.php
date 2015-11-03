<?php

namespace DsCorp\Personal\PersonalBundle\Entity;

/**
 * puesto
 */
class puesto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $puesto;


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
     * Set puesto
     *
     * @param string $puesto
     *
     * @return puesto
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string
     */
    public function getPuesto()
    {
        return $this->puesto;
    }
}

