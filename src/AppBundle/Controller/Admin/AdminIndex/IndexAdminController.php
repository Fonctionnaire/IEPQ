<?php

namespace AppBundle\Controller\Admin\AdminIndex;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexAdminController extends Controller
{

    /**
     * @Route("/admin", name="index_admin")
     * @Method({"GET"})
     */
    public function adminIndexAction()
    {

        return $this->render(':Admin/IndexAdmin:indexAdmin.html.twig');
    }
}