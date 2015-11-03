<?php

namespace DsCorp\Fabricante\FabricanteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Fabricante\FabricanteBundle\Entity\procedencia;
use DsCorp\Fabricante\FabricanteBundle\Form\procedenciaType;

/**
 * procedencia controller.
 *
 */
class procedenciaController extends Controller
{

    /**
     * Lists all procedencia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabricanteBundle:procedencia')->findAll();

        return $this->render('FabricanteBundle:procedencia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new procedencia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new procedencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('procedencia_show', array('id' => $entity->getId())));
        }

        return $this->render('FabricanteBundle:procedencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a procedencia entity.
     *
     * @param procedencia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(procedencia $entity)
    {
        $form = $this->createForm(new procedenciaType(), $entity, array(
            'action' => $this->generateUrl('procedencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new procedencia entity.
     *
     */
    public function newAction()
    {
        $entity = new procedencia();
        $form   = $this->createCreateForm($entity);

        return $this->render('FabricanteBundle:procedencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a procedencia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabricanteBundle:procedencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find procedencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FabricanteBundle:procedencia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing procedencia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabricanteBundle:procedencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find procedencia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FabricanteBundle:procedencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a procedencia entity.
    *
    * @param procedencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(procedencia $entity)
    {
        $form = $this->createForm(new procedenciaType(), $entity, array(
            'action' => $this->generateUrl('procedencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing procedencia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabricanteBundle:procedencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find procedencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('procedencia_edit', array('id' => $id)));
        }

        return $this->render('FabricanteBundle:procedencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a procedencia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabricanteBundle:procedencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find procedencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('procedencia'));
    }

    /**
     * Creates a form to delete a procedencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('procedencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
