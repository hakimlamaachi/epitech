<?php

namespace App\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BookingBundle\Entity\HoraireBreaks;
use App\BookingBundle\Form\HoraireBreaksType;

/**
 * HoraireBreaks controller.
 *
 */
class HoraireBreaksController extends Controller
{
    /**
     * Lists all HoraireBreaks entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $horaireBreaks = $em->getRepository('AppBookingBundle:HoraireBreaks')->findAll();

        return $this->render('horairebreaks/index.html.twig', array(
            'horaireBreaks' => $horaireBreaks,
        ));
    }

    /**
     * Creates a new HoraireBreaks entity.
     *
     */
    public function newAction(Request $request)
    {
        $horaireBreak = new HoraireBreaks();
        $form = $this->createForm(new HoraireBreaksType(), $horaireBreak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horaireBreak);
            $em->flush();

            return $this->redirectToRoute('horairebreaks_show', array('id' => $horairebreaks->getId()));
        }

        return $this->render('horairebreaks/new.html.twig', array(
            'horaireBreak' => $horaireBreak,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a HoraireBreaks entity.
     *
     */
    public function showAction(HoraireBreaks $horaireBreak)
    {
        $deleteForm = $this->createDeleteForm($horaireBreak);

        return $this->render('horairebreaks/show.html.twig', array(
            'horaireBreak' => $horaireBreak,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing HoraireBreaks entity.
     *
     */
    public function editAction(Request $request, HoraireBreaks $horaireBreak)
    {
        $deleteForm = $this->createDeleteForm($horaireBreak);
        $editForm = $this->createForm(new HoraireBreaksType(), $horaireBreak);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horaireBreak);
            $em->flush();

            return $this->redirectToRoute('horairebreaks_edit', array('id' => $horaireBreak->getId()));
        }

        return $this->render('horairebreaks/edit.html.twig', array(
            'horaireBreak' => $horaireBreak,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a HoraireBreaks entity.
     *
     */
    public function deleteAction(Request $request, HoraireBreaks $horaireBreak)
    {
        $form = $this->createDeleteForm($horaireBreak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($horaireBreak);
            $em->flush();
        }

        return $this->redirectToRoute('horairebreaks_index');
    }

    /**
     * Creates a form to delete a HoraireBreaks entity.
     *
     * @param HoraireBreaks $horaireBreak The HoraireBreaks entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HoraireBreaks $horaireBreak)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('horairebreaks_delete', array('id' => $horaireBreak->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
