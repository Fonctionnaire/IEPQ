<?php

namespace AppBundle\Entity\Tablettes;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvisTablettes
 *
 * @ORM\Table(name="tablettes_avis_tablettes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Tablettes\AvisTablettesRepository")
 */
class AvisTablettes
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
     * @ORM\Column(name="avis", type="text")
     */
    private $avis;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var bool
     *
     * @ORM\Column(name="signale", type="boolean")
     */
    private $signale = false;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuAchat", type="string", length=255, nullable=true)
     */
    private $lieuAchat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tablettes\Tablettes", inversedBy="avis")
     */
    private $tablette;


    public function __construct()
    {
        $this->dateAjout = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getTablette()
    {
        return $this->tablette;
    }

    /**
     * @param mixed $tablette
     */
    public function setTablette($tablette)
    {
        $this->tablette = $tablette;
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
     * Set avis
     *
     * @param string $avis
     *
     * @return AvisTablettes
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return string
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return AvisTablettes
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
     * Set signale
     *
     * @param boolean $signale
     *
     * @return AvisTablettes
     */
    public function setSignale($signale)
    {
        $this->signale = $signale;

        return $this;
    }

    /**
     * Get signale
     *
     * @return bool
     */
    public function getSignale()
    {
        return $this->signale;
    }

    /**
     * Set lieuAchat
     *
     * @param string $lieuAchat
     *
     * @return AvisTablettes
     */
    public function setLieuAchat($lieuAchat)
    {
        $this->lieuAchat = $lieuAchat;

        return $this;
    }

    /**
     * Get lieuAchat
     *
     * @return string
     */
    public function getLieuAchat()
    {
        return $this->lieuAchat;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return AvisTablettes
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }
}

