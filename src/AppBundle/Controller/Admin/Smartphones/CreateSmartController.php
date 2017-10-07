<?php

namespace AppBundle\Controller\Admin\Smartphones;

use AppBundle\Entity\Categories\Categories;
use AppBundle\Entity\Smartphones\Smartphones;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateSmartController extends Controller
{
    /**
     * @Route("/admin/create-smartphone", name="create_smartphone")
     * @Method({"GET", "POST"})
     */
    public function createSmartAction(Request $request)
    {

        $smartphone = new Smartphones();

        $form = $this->createForm('AppBundle\Form\Smartphones\SmartphonesType', $smartphone);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $categories = $em->getRepository('AppBundle:Categories\Categories')->findOneById(3);
            $smartphone->setCategorie($categories);
            $em->persist($smartphone);
            $em->flush();

            return $this->redirectToRoute('create_smartphone');
        }

        return $this->render(':Admin/Smartphones:createSmartphone.html.twig', array('form' => $form->createView()));

    }

}