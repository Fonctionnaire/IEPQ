<?php

namespace AppBundle\Services\Tablettes;

use AppBundle\Entity\Tablettes\AvisTablettes;
use AppBundle\Entity\Tablettes\Tablettes;

class NoteTablettes
{
    public function calculNoteTablette(Tablettes $tablettes, AvisTablettes $avisTablettes)
    {
        $noteActuel = $tablettes->getNote();
        $noteAvis = $avisTablettes->getNote();

        $note = $noteActuel + $noteAvis;

        return $note;
    }

}