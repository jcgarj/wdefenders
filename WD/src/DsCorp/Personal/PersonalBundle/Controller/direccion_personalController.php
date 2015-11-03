<?php

namespace DsCorp\Personal\PersonalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Personal\PersonalBundle\Entity\direccion_personal;
use DsCorp\Personal\PersonalBundle\Form\direccion_personalType;

/**
 * direccion_personal controller.
 *
 */
class direccion_personalController extends Controller
{

    /**
     * Lists all direccion_personal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PersonalBundle:direccion_personal')->findAll();

        return $this->render('PersonalBundle:direccion_personal:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new direccion_personal entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new direccion_personal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_personal_show', array('id' => $entity->getId())));
        }

        return $this->render('PersonalBundle:direccion_personal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a direccion_personal entity.
     *
     * @param direccion_personal $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(direccion_personal $entity)
    {
        $form = $this->createForm(new direccion_personalType(), $entity, array(
            'action' => $this->generateUrl('direccion_personal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new direccion_personal entity.
     *
     */
    public function newAction()
    {
        $entity = new direccion_personal();
        $form   = $this->createCreateForm($entity);

        return $this->render('PersonalBundle:direccion_personal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a direccion_personal entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:direccion_personal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_personal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonalBundle:direccion_personal:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing direccion_personal entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:direccion_personal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_personal entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonalBundle:direccion_personal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a direccion_personal entity.
    *
    * @param direccion_personal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(direccion_personal $entity)
    {
        $form = $this->createForm(new direccion_personalType(), $entity, array(
            'action' => $this->generateUrl('direccion_personal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing direccion_personal entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:direccion_personal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_personal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_personal_edit', array('id' => $id)));
        }

        return $this->render('PersonalBundle:direccion_personal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a direccion_personal entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PersonalBundle:direccion_personal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find direccion_personal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('direccion_personal'));
    }

    /**
     * Creates a form to delete a direccion_personal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccion_personal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
