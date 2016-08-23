<?php

namespace App\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BookingBundle\Entity\Conge;
use App\BookingBundle\Form\CongeType;

/**
 * Conge controller.
 *
 */
class CongeController extends Controller
{
    /**
     * Lists all Conge entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conges = $em->getRepository('AppBookingBundle:Conge')->findAll();

        return $this->render('conge/index.html.twig', array(
            'conges' => $conges,
        ));
    }

    /**
     * Creates a new Conge entity.
     *
     */
    public function newAction(Request $request)
    {
        $conge = new Conge();
        $form = $this->createForm(new CongeType(), $conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conge);
            $em->flush();

            return $this->redirectToRoute('conge_show', array('id' => $conge->getId()));
        }

        return $this->render('conge/new.html.twig', array(
            'conge' => $conge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Conge entity.
     *
     */
    public function showAction(Conge $conge)
    {
        $deleteForm = $this->createDeleteForm($conge);

        return $this->render('conge/show.html.twig', array(
            'conge' => $conge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Conge entity.
     *
     */
    public function editAction(Request $request, Conge $conge)
    {
        $deleteForm = $this->createDeleteForm($conge);
        $editForm = $this->createForm(new CongeType(), $conge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conge);
            $em->flush();

            return $this->redirectToRoute('conge_edit', array('id' => $conge->getId()));
        }

        return $this->render('conge/edit.html.twig', array(
            'conge' => $conge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Conge entity.
     *
     */
    public function deleteAction(Request $request, Conge $conge)
    {
        $form = $this->createDeleteForm($conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conge);
            $em->flush();
        }

        return $this->redirectToRoute('conge_index');
    }

    /**
     * Creates a form to delete a Conge entity.
     *
     * @param Conge $conge The Conge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Conge $conge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conge_delete', array('id' => $conge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
