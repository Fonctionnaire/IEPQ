<?php

namespace AppBundle\Entity\Smartphones;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Smartphones
 *
 * @ORM\Table(name="smartphones_smartphones")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Smartphones\SmartphonesRepository")
 */
class Smartphones
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
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var string
     * @Gedmo\Slug(fields={"model"})
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Smartphones\MarquesSmart", inversedBy="smartphones")
     */
    private $marque;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categories\Categories")
     */
    private $categorie;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Avis\Avis")
     * @ORM\JoinTable(name="smartphone_avis",
     *      joinColumns={@ORM\JoinColumn(name="smartphone_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="avis_id", referencedColumnName="id", unique=true)}
     *      )
     * @ORM\JoinColumn(nullable=true)
     */
    private $avis;

    public function __construct()
    {
        $this->avis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * @param mixed $avis
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

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
     * @return Smartphones
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
     * Set note
     *
     * @param integer $note
     *
     * @return Smartphones
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Smartphones
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

