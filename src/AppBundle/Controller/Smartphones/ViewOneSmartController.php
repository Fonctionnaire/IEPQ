<?php

namespace AppBundle\Controller\Smartphones;

use AppBundle\Entity\Smartphones\AvisSmartphones;
use AppBundle\Entity\Smartphones\Smartphones;
use AppBundle\Services\Smartphones\NoteSmartphone;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ViewOneSmartController extends Controller
{

    /**
     * @Route("/smartphones/{slug}", name="view_one_smartphone")
     * @Method({"GET", "POST"})
     */
    public function viewOneSmartAction(Smartphones $smartphones, Request $request, NoteSmartphone $noteSmartphone)
    {
        $avis = new AvisSmartphones();
        $form = $this->createForm('AppBundle\Form\Smartphones\AvisSmartphonesType', $avis);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $note = $noteSmartphone->calculNote($smartphones, $avis);
            $smartphones->setNote($note);
            $avis->setSmartphone($smartphones);
            $em->persist($avis);
            $em->flush();

            return $this->redirectToRoute('view_one_smartphone', array('slug' => $smartphones->getSlug()));
        }

        return $this->render('smartphones/viewOneSmartphone.html.twig', array(
            'smartphone' => $smartphones,
            'form' => $form->createView()
        ));
    }
}