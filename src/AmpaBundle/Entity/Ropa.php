<?php

namespace AmpaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ropa
 *
 * @ORM\Table(name="ropa")
 * @ORM\Entity(repositoryClass="AmpaBundle\Repository\RopaRepository")
 */
class Ropa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Marca", type="string", length=50)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre_pieza", type="string", length=50)
     */
    private $nombrePieza;

    /**
     * @var string
     *
     * @ORM\Column(name="Genero", type="string", length=50)
     */
    private $genero;

    /**
     * @var string
     *
     * @ORM\Column(name="Talla", type="string", length=50)
     */
    private $talla;

    /**
     * @var float
     *
     * @ORM\Column(name="Precio", type="float")
     */
    private $precio;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Ropa
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set nombrePieza
     *
     * @param string $nombrePieza
     *
     * @return Ropa
     */
    public function setNombrePieza($nombrePieza)
    {
        $this->nombrePieza = $nombrePieza;

        return $this;
    }

    /**
     * Get nombrePieza
     *
     * @return string
     */
    public function getNombrePieza()
    {
        return $this->nombrePieza;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Ropa
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set talla
     *
     * @param string $talla
     *
     * @return Ropa
     */
    public function setTalla($talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Get talla
     *
     * @return string
     */
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Ropa
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }
}

