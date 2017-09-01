<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Component;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Component controller.
 *
 */
class ComponentController extends Controller
{
    /**
     * Lists all component entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $components = $em->getRepository('AppBundle:Component')->findAll();

        return $this->render('component/index.html.twig', array(
            'components' => $components,
        ));
    }

    /**
     * Creates a new component entity.
     *
     */
    public function newAction(Request $request)
    {
        $component = new Component();
        $form = $this->createForm('AppBundle\Form\ComponentType', $component);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($component);
            $em->flush();

            return $this->redirectToRoute('component_show', array('id' => $component->getId()));
        }

        return $this->render('component/new.html.twig', array(
            'component' => $component,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a component entity.
     *
     */
    public function showAction(Component $component)
    {
        $deleteForm = $this->createDeleteForm($component);

        return $this->render('component/show.html.twig', array(
            'component' => $component,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing component entity.
     *
     */
    public function editAction(Request $request, Component $component)
    {
        $deleteForm = $this->createDeleteForm($component);
        $editForm = $this->createForm('AppBundle\Form\ComponentType', $component);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('component_edit', array('id' => $component->getId()));
        }

        return $this->render('component/edit.html.twig', array(
            'component' => $component,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a component entity.
     *
     */
    public function deleteAction(Request $request, Component $component)
    {
        $form = $this->createDeleteForm($component);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($component);
            $em->flush();
        }

        return $this->redirectToRoute('component_index');
    }

    /**
     * Creates a form to delete a component entity.
     *
     * @param Component $component The component entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Component $component)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('component_delete', array('id' => $component->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
