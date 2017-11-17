<?php

namespace AmpaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * marca
 *
 * @ORM\Table(name="marca")
 * @ORM\Entity(repositoryClass="AmpaBundle\Repository\marcaRepository")
 */
class marca
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
     * @ORM\Column(name="nombre_marca", type="string", length=255)
     */
    private $nombreMarca;

    /**
      * @ORM\OneToMany(targetEntity="Ropa", mappedBy="marca")
      */
    private $ropa;

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
     * Set nombreMarca
     *
     * @param string $nombreMarca
     *
     * @return marca
     */
    public function setNombreMarca($nombreMarca)
    {
        $this->nombreMarca = $nombreMarca;

        return $this;
    }

    /**
     * Get nombreMarca
     *
     * @return string
     */
    public function getNombreMarca()
    {
        return $this->nombreMarca;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ropa = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ropa
     *
     * @param \AmpaBundle\Entity\Ropa $ropa
     *
     * @return marca
     */
    public function addRopa(\AmpaBundle\Entity\Ropa $ropa)
    {
        $this->ropa[] = $ropa;

        return $this;
    }

    /**
     * Remove ropa
     *
     * @param \AmpaBundle\Entity\Ropa $ropa
     */
    public function removeRopa(\AmpaBundle\Entity\Ropa $ropa)
    {
        $this->ropa->removeElement($ropa);
    }

    /**
     * Get ropa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRopa()
    {
        return $this->ropa;
    }

    public function __toString()
   {
       return $this->nombreMarca;
   }
}
