<?php

namespace AppBundle\Controller\Admin\Restaurants;

use AppBundle\Entity\Restaurants\Restaurants;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateRestaurantController extends Controller
{
    /**
     * @Route("/admin/create-restaurant", name="create_restaurant")
     * @Method({"GET", "POST"})
     */
    public function createRestaurantAction(Request $request)
    {
        $restaurant = new Restaurants();
        $form = $this->createForm('AppBundle\Form\Restaurants\RestaurantsType', $restaurant);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $categorie = $em->getRepository('AppBundle:Categories\Categories')->findOneById(4);
            $restaurant->setCategorie($categorie);
            $em->persist($restaurant);
            $em->flush();

            return $this->redirectToRoute('create_restaurant');
        }

        return $this->render(':Admin/Restaurants:createRestaurant.html.twig', array('form' => $form->createView()));
    }

}