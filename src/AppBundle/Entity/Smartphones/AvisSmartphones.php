<?php

namespace AppBundle\Entity\Smartphones;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvisSmartphones
 *
 * @ORM\Table(name="smartphones_avis_smartphones")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Smartphones\AvisSmartphonesRepository")
 */
class AvisSmartphones
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Smartphones\Smartphones", inversedBy="avis")
     */
    private $smartphone;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    public function __construct()
    {
        $this->dateAjout = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param \DateTime $dateAjout
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return mixed
     */
    public function getSmartphone()
    {
        return $this->smartphone;
    }

    /**
     * @param mixed $smartphone
     */
    public function setSmartphone($smartphone)
    {
        $this->smartphone = $smartphone;
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
     * @return AvisSmartphones
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
     * @return AvisSmartphones
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
     * @return bool
     */
    public function isSignale()
    {
        return $this->signale;
    }

    /**
     * @param bool $signale
     */
    public function setSignale($signale)
    {
        $this->signale = $signale;
    }

    /**
     * Set lieuAchat
     *
     * @param string $lieuAchat
     *
     * @return AvisSmartphones
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

}

