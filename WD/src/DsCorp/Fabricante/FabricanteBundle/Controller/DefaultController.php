<?php

namespace DsCorp\Fabricante\FabricanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FabricanteBundle:Default:index.html.twig', array('name' => $name));
    }
}
