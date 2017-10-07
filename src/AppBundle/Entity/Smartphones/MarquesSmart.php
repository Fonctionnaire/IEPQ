<?php

namespace AppBundle\Entity\Smartphones;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MarquesSmart
 *
 * @ORM\Table(name="smartphones_marques_smart")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Smartphones\MarquesSmartRepository")
 */
class MarquesSmart
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Smartphones\Smartphones", mappedBy="marque", cascade={"remove",
     *     "persist"})
     */
    private $smartphones;

    /**
     * @return mixed
     */
    public function getSmartphones()
    {
        return $this->smartphones;
    }

    /**
     * @param mixed $smartphones
     */
    public function setSmartphones($smartphones)
    {
        $this->smartphones = $smartphones;
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
     * @return MarquesSmart
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
     * @return MarquesSmart
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

