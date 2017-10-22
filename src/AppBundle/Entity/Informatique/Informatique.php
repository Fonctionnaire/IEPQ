<?php

namespace AppBundle\Entity\Informatique;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Informatique
 *
 * @ORM\Table(name="informatique_informatique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Informatique\InformatiqueRepository")
 */
class Informatique
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
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     * @Gedmo\Slug(fields={"model"})
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide = false;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Informatique\MarqueInformatique", inversedBy="informatique")
     */
    private $marque;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Informatique\CategorieInfo")
     */
    private $categorieInfo;


    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }


    /**
     * @return mixed
     */
    public function getCategorieInfo()
    {
        return $this->categorieInfo;
    }

    /**
     * @param mixed $categorieInfo
     */
    public function setCategorieInfo($categorieInfo)
    {
        $this->categorieInfo = $categorieInfo;
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
     * Set model
     *
     * @param string $model
     *
     * @return Informatique
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Informatique
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

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return Informatique
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return bool
     */
    public function getValide()
    {
        return $this->valide;
    }
}

