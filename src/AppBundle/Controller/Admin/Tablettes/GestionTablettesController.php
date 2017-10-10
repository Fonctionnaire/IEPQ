<?php


namespace AppBundle\Controller\Admin\Tablettes;


use AppBundle\Entity\Tablettes\Tablettes;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GestionTablettesController extends Controller
{
    /**
     * @Route("/admin/gestion-tablettes", name="gestion_tablettes")
     * @Method({"GET", "POST"})
     */
    public function allRestaurantsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $allTablettes = $em->getRepository('AppBundle:Tablettes\Tablettes')->findAll();

        $tablette = new Tablettes();
        $form = $this->createForm('AppBundle\Form\Tablettes\TablettesType', $tablette);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
            $categorie = $em->getRepository('AppBundle:Categories\Categories')->findOneById(5);
            $tablette->setCategorie($categorie);
            $em->persist($tablette);
            $em->flush();

            return $this->redirectToRoute('gestion_tablettes');
        }
        return $this->render(':Admin/Tablettes:gestionTablettes.html.twig', array(
            'allTablettes' => $allTablettes, 'form' => $form->createView()
        ));
    }
}