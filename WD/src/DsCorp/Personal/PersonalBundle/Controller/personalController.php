<?php

namespace DsCorp\Personal\PersonalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Personal\PersonalBundle\Entity\personal;
use DsCorp\Personal\PersonalBundle\Form\personalType;

/**
 * personal controller.
 *
 */
class personalController extends Controller
{

    /**
     * Lists all personal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PersonalBundle:personal')->findAll();

        return $this->render('PersonalBundle:personal:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new personal entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new personal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personal_show', array('id' => $entity->getId())));
        }

        return $this->render('PersonalBundle:personal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a personal entity.
     *
     * @param personal $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(personal $entity)
    {
        $form = $this->createForm(new personalType(), $entity, array(
            'action' => $this->generateUrl('personal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new personal entity.
     *
     */
    public function newAction()
    {
        $entity = new personal();
        $form   = $this->createCreateForm($entity);

        return $this->render('PersonalBundle:personal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a personal entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:personal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find personal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonalBundle:personal:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing personal entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:personal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find personal entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonalBundle:personal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a personal entity.
    *
    * @param personal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(personal $entity)
    {
        $form = $this->createForm(new personalType(), $entity, array(
            'action' => $this->generateUrl('personal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing personal entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:personal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find personal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('personal_edit', array('id' => $id)));
        }

        return $this->render('PersonalBundle:personal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a personal entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PersonalBundle:personal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find personal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personal'));
    }

    /**
     * Creates a form to delete a personal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
