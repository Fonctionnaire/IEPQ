<?php

namespace AppBundle\Entity\Tablettes;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MarquesTablette
 *
 * @ORM\Table(name="tablettes_marques_tablette")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Tablettes\MarquesTabletteRepository")
 */
class MarquesTablette
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
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     * @Gedmo\Slug(fields={"marque"})
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tablettes\Tablettes", mappedBy="marque", cascade={"remove",
     *     "persist"})
     */
    private $tablettes;

    /**
     * @return mixed
     */
    public function getTablettes()
    {
        return $this->tablettes;
    }

    /**
     * @param mixed $tablettes
     */
    public function setTablettes($tablettes)
    {
        $this->tablettes = $tablettes;
    }

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
     * Set marque
     *
     * @param string $marque
     *
     * @return MarquesTablette
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return MarquesTablette
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}

