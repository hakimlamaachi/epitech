<?php

namespace App\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BookingBundle\Entity\Horaire;
use App\BookingBundle\Form\HoraireType;

/**
 * Horaire controller.
 *
 */
class HoraireController extends Controller
{
    /**
     * Lists all Horaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $horaires = $em->getRepository('AppBookingBundle:Horaire')->findAll();

        return $this->render('horaire/index.html.twig', array(
            'horaires' => $horaires,
        ));
    }

    /**
     * Creates a new Horaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $horaire = new Horaire();
        $form = $this->createForm(new HoraireType(), $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horaire);
            $em->flush();

            return $this->redirectToRoute('horaire_show', array('id' => $horaire->getId()));
        }

        return $this->render('horaire/new.html.twig', array(
            'horaire' => $horaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Horaire entity.
     *
     */
    public function showAction(Horaire $horaire)
    {
        $deleteForm = $this->createDeleteForm($horaire);

        return $this->render('horaire/show.html.twig', array(
            'horaire' => $horaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Horaire entity.
     *
     */
    public function editAction(Request $request, Horaire $horaire)
    {
        $deleteForm = $this->createDeleteForm($horaire);
        $editForm = $this->createForm(new HoraireType(), $horaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horaire);
            $em->flush();

            return $this->redirectToRoute('horaire_edit', array('id' => $horaire->getId()));
        }

        return $this->render('horaire/edit.html.twig', array(
            'horaire' => $horaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Horaire entity.
     *
     */
    public function deleteAction(Request $request, Horaire $horaire)
    {
        $form = $this->createDeleteForm($horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($horaire);
            $em->flush();
        }

        return $this->redirectToRoute('horaire_index');
    }

    /**
     * Creates a form to delete a Horaire entity.
     *
     * @param Horaire $horaire The Horaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Horaire $horaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('horaire_delete', array('id' => $horaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
