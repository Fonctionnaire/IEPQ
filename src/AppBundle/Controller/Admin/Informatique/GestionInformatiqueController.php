<?php

namespace AppBundle\Controller\Admin\Informatique;

use AppBundle\Entity\Informatique\Informatique;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GestionInformatiqueController extends Controller
{
    /**
     * @Route("/admin/gestion-informatique", name="gestion_informatique")
     * @Method({"GET", "POST"})
     */
    public function gestionInformatiqueAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $allInfo = $em->getRepository('AppBundle:Informatique\Informatique')->findAll();

        $informatique = new Informatique();
        $form = $this->createForm('AppBundle\Form\Informatique\InformatiqueType', $informatique);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
            $informatique->setValide(true);
            $em->persist($informatique);
            $em->flush();

            return $this->redirectToRoute('gestion_informatique');
        }

        return $this->render(':Admin/Informatique:gestionInformatique.html.twig', array(
            'form' => $form->createView(),
            'allInfo' => $allInfo
        ));
    }
}