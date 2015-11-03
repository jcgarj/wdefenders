<?php

namespace DsCorp\Personal\PersonalBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Personal\PersonalBundle\Entity\avisos;

/**
 * avisos controller.
 *
 */
class avisosController extends Controller
{

    /**
     * Lists all avisos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PersonalBundle:avisos')->findAll();

        return $this->render('PersonalBundle:avisos:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a avisos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:avisos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find avisos entity.');
        }

        return $this->render('PersonalBundle:avisos:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
