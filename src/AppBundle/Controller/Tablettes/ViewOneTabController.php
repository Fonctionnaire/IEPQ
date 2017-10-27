<?php

namespace AppBundle\Controller\Tablettes;

use AppBundle\Entity\Tablettes\AvisTablettes;
use AppBundle\Entity\Tablettes\Tablettes;
use AppBundle\Services\Tablettes\NoteTablettes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ViewOneTabController extends Controller
{
    /**
     * @Route("/tablettes/{slug}", name="view_one_tab")
     */
    public function viewOneTabAction(Tablettes $tablettes, Request $request, NoteTablettes $noteTablettes)
    {
        $avis = new AvisTablettes();

        $form = $this->createForm('AppBundle\Form\Tablettes\AvisTablettesType', $avis);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $note = $noteTablettes->calculNoteTablette($tablettes, $avis);
            $tablettes->setNote($note);
            $avis->setTablette($tablettes);
            $em->persist($avis);
            $em->flush();

            return $this->redirectToRoute('view_one_tab', array('slug' => $tablettes->getSlug()));
        }

        return $this->render('tablettes/viewOneTablette.html.twig', array(
            'tablette' => $tablettes,
            'form' => $form->createView()
        ));
    }

}