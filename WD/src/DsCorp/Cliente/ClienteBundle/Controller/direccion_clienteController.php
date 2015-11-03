<?php

namespace DsCorp\Cliente\ClienteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Cliente\ClienteBundle\Entity\direccion_cliente;
use DsCorp\Cliente\ClienteBundle\Form\direccion_clienteType;

/**
 * direccion_cliente controller.
 *
 */
class direccion_clienteController extends Controller
{

    /**
     * Lists all direccion_cliente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClienteBundle:direccion_cliente')->findAll();

        return $this->render('ClienteBundle:direccion_cliente:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new direccion_cliente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new direccion_cliente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_cliente_show', array('id' => $entity->getId())));
        }

        return $this->render('ClienteBundle:direccion_cliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a direccion_cliente entity.
     *
     * @param direccion_cliente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(direccion_cliente $entity)
    {
        $form = $this->createForm(new direccion_clienteType(), $entity, array(
            'action' => $this->generateUrl('direccion_cliente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new direccion_cliente entity.
     *
     */
    public function newAction()
    {
        $entity = new direccion_cliente();
        $form   = $this->createCreateForm($entity);

        return $this->render('ClienteBundle:direccion_cliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a direccion_cliente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:direccion_cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClienteBundle:direccion_cliente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing direccion_cliente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:direccion_cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_cliente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClienteBundle:direccion_cliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a direccion_cliente entity.
    *
    * @param direccion_cliente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(direccion_cliente $entity)
    {
        $form = $this->createForm(new direccion_clienteType(), $entity, array(
            'action' => $this->generateUrl('direccion_cliente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing direccion_cliente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:direccion_cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_cliente_edit', array('id' => $id)));
        }

        return $this->render('ClienteBundle:direccion_cliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a direccion_cliente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClienteBundle:direccion_cliente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find direccion_cliente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('direccion_cliente'));
    }

    /**
     * Creates a form to delete a direccion_cliente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccion_cliente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
