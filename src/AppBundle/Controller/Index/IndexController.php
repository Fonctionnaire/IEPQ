<?php

namespace AppBundle\Controller\Index;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{

    /**
     * @Route("/", name="home")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lastSmart = $em->getRepository('AppBundle:Smartphones\Smartphones')->getLastSmart();
        $lastRestau = $em->getRepository('AppBundle:Restaurants\Restaurants')->getLastRestau();
        $lastTab = $em->getRepository('AppBundle:Tablettes\Tablettes')->getLastTab();

        dump($lastRestau);

        return $this->render('index/index.html.twig', array(
            'lastSmart' => $lastSmart,
            'lastRestau' => $lastRestau,
            'lastTab' => $lastTab
        ));
    }
}