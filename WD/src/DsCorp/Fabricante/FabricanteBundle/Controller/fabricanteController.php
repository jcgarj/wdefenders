<?php

namespace DsCorp\Fabricante\FabricanteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Fabricante\FabricanteBundle\Entity\fabricante;
use DsCorp\Fabricante\FabricanteBundle\Form\fabricanteType;

/**
 * fabricante controller.
 *
 */
class fabricanteController extends Controller
{

    /**
     * Lists all fabricante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabricanteBundle:fabricante')->findAll();

        return $this->render('FabricanteBundle:fabricante:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new fabricante entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new fabricante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fabricante_show', array('id' => $entity->getId())));
        }

        return $this->render('FabricanteBundle:fabricante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a fabricante entity.
     *
     * @param fabricante $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(fabricante $entity)
    {
        $form = $this->createForm(new fabricanteType(), $entity, array(
            'action' => $this->generateUrl('fabricante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new fabricante entity.
     *
     */
    public function newAction()
    {
        $entity = new fabricante();
        $form   = $this->createCreateForm($entity);

        return $this->render('FabricanteBundle:fabricante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fabricante entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabricanteBundle:fabricante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find fabricante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FabricanteBundle:fabricante:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fabricante entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabricanteBundle:fabricante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find fabricante entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FabricanteBundle:fabricante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a fabricante entity.
    *
    * @param fabricante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(fabricante $entity)
    {
        $form = $this->createForm(new fabricanteType(), $entity, array(
            'action' => $this->generateUrl('fabricante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing fabricante entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabricanteBundle:fabricante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find fabricante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fabricante_edit', array('id' => $id)));
        }

        return $this->render('FabricanteBundle:fabricante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a fabricante entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabricanteBundle:fabricante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find fabricante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fabricante'));
    }

    /**
     * Creates a form to delete a fabricante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fabricante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
