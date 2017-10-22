<?php

namespace AppBundle\Controller\Admin\Smartphones;


use AppBundle\Entity\Smartphones\Smartphones;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GestionSmartController extends Controller
{
    /**
     * @Route("/admin/gestion-smartphones", name="gestion_smartphones")
     * @Method({"GET", "POST"})
     */
    public function allRestaurantsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $allSmartphones = $em->getRepository('AppBundle:Smartphones\Smartphones')->findAll();

        $smartphone = new Smartphones();
        $form = $this->createForm('AppBundle\Form\Smartphones\SmartphonesType', $smartphone);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $smartphone->setValide(true);
            $em->persist($smartphone);
            $em->flush();

            return $this->redirectToRoute('gestion_smartphones');
        }

        return $this->render(':Admin/Smartphones:gestionSmartphones.html.twig', array(
            'allSmartphones' => $allSmartphones, 'form' => $form->createView()
        ));
    }
}