<?php

namespace AppBundle\Entity\Informatique;

use Doctrine\ORM\Mapping as ORM;

/**
 * MarqueInformatique
 *
 * @ORM\Table(name="informatique_marque_informatique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Informatique\MarqueInformatiqueRepository")
 */
class MarqueInformatique
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
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Informatique\Informatique", mappedBy="marque", cascade={"remove", "persist"})
     */
    private $informatique;

    /**
     * @return mixed
     */
    public function getInformatique()
    {
        return $this->informatique;
    }

    /**
     * @param mixed $informatique
     */
    public function setInformatique($informatique)
    {
        $this->informatique = $informatique;
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
     * @return MarqueInformatique
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
     * @return MarqueInformatique
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

