<?php

namespace DsCorp\Personal\PersonalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PersonalBundle:Default:index.html.twig', array('name' => $name));
    }
}
