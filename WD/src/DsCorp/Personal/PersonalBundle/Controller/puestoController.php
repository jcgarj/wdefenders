<?php

namespace DsCorp\Personal\PersonalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Personal\PersonalBundle\Entity\puesto;
use DsCorp\Personal\PersonalBundle\Form\puestoType;

/**
 * puesto controller.
 *
 */
class puestoController extends Controller
{

    /**
     * Lists all puesto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PersonalBundle:puesto')->findAll();

        return $this->render('PersonalBundle:puesto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new puesto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new puesto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('puesto_show', array('id' => $entity->getId())));
        }

        return $this->render('PersonalBundle:puesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a puesto entity.
     *
     * @param puesto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(puesto $entity)
    {
        $form = $this->createForm(new puestoType(), $entity, array(
            'action' => $this->generateUrl('puesto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new puesto entity.
     *
     */
    public function newAction()
    {
        $entity = new puesto();
        $form   = $this->createCreateForm($entity);

        return $this->render('PersonalBundle:puesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a puesto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:puesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find puesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonalBundle:puesto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing puesto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:puesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find puesto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonalBundle:puesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a puesto entity.
    *
    * @param puesto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(puesto $entity)
    {
        $form = $this->createForm(new puestoType(), $entity, array(
            'action' => $this->generateUrl('puesto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing puesto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonalBundle:puesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find puesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('puesto_edit', array('id' => $id)));
        }

        return $this->render('PersonalBundle:puesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a puesto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PersonalBundle:puesto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find puesto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('puesto'));
    }

    /**
     * Creates a form to delete a puesto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('puesto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
