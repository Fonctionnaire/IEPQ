<?php
/**
 * Created by PhpStorm.
 * User: thiba
 * Date: 08/10/2017
 * Time: 13:44
 */

namespace AppBundle\Controller\Admin\Restaurants;


use AppBundle\Entity\Restaurants\Restaurants;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GestionRestaurantsController extends Controller
{

    /**
     * @Route("/admin/gestion-restaurants", name="gestion_restaurants")
     * @Method({"GET", "POST"})
     */
    public function allRestaurantsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $allRestaurants = $em->getRepository('AppBundle:Restaurants\Restaurants')->findAll();

        $restaurant = new Restaurants();
        $form = $this->createForm('AppBundle\Form\Restaurants\RestaurantsType', $restaurant);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted())
        {
            $categorie = $em->getRepository('AppBundle:Categories\Categories')->findOneById(4);
            $restaurant->setCategorie($categorie);
            $em->persist($restaurant);
            $em->flush();

            return $this->redirectToRoute('gestion_restaurants');
        }

        return $this->render(':Admin/Restaurants:gestionRestaurants.html.twig', array(
            'allRestaurants' => $allRestaurants, 'form' => $form->createView()
        ));
    }
}