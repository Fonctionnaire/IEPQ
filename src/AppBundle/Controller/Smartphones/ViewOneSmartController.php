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
     * @Route("/smartphones/{slug}", defaults={"page": "1", "_format"="html"} ,name="view_one_smartphone")
     * @Route("/smartphones/{slug}/{page}", defaults={"_format"="html"}, requirements={"page": "[0-9]\d*"}, name="avis_smartphone_paginated")
     * @Method({"GET", "POST"})
     */
    public function viewOneSmartAction(Smartphones $smartphones, Request $request, NoteSmartphone $noteSmartphone, $page)
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

        $listAvis = $this->getDoctrine()->getManager()->getRepository('AppBundle:Smartphones\AvisSmartphones')
            ->getAvisPaginated($page, $smartphones);
        $nbPages = ceil(count($listAvis) / AvisSmartphones::NUM_ITEMS);
        return $this->render('smartphones/viewOneSmartphone.html.twig', array(
            'smartphone' => $smartphones,
            'listAvis' => $listAvis,
            'nbPages' => $nbPages,
            'page' => $page,
            'slug' => $smartphones->getSlug(),
            'form' => $form->createView()
        ));
    }
}