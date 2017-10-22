<?php

namespace AppBundle\Services\Smartphones;


use AppBundle\Entity\Smartphones\AvisSmartphones;
use AppBundle\Entity\Smartphones\Smartphones;

class NoteSmartphone
{

    public function calculNote(Smartphones $smartphones, AvisSmartphones $avisSmartphones)
    {

        $noteActuel = $smartphones->getNote();
        $noteAvis = $avisSmartphones->getNote();

        $note = $noteActuel + $noteAvis;

        return $note;

    }
}