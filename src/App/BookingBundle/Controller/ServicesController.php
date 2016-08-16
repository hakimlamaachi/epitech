<?php

namespace App\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BookingBundle\Entity\Services;
use App\BookingBundle\Form\ServicesType;

/**
 * Services controller.
 *
 */
class ServicesController extends Controller
{
    /**
     * Lists all Services entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('AppBookingBundle:Services')->findAll();

        return $this->render('services/index.html.twig', array(
            'services' => $services,
        ));
    }

    /**
     * Creates a new Services entity.
     *
     */
    public function newAction(Request $request)
    {
        $service = new Services();
        $form = $this->createForm(new ServicesType(), $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('services_show', array('id' => $services->getId()));
        }

        return $this->render('services/new.html.twig', array(
            'service' => $service,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Services entity.
     *
     */
    public function showAction(Services $service)
    {
        $deleteForm = $this->createDeleteForm($service);

        return $this->render('services/show.html.twig', array(
            'service' => $service,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Services entity.
     *
     */
    public function editAction(Request $request, Services $service)
    {
        $deleteForm = $this->createDeleteForm($service);
        $editForm = $this->createForm(new ServicesType(), $service);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('services_edit', array('id' => $service->getId()));
        }

        return $this->render('services/edit.html.twig', array(
            'service' => $service,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Services entity.
     *
     */
    public function deleteAction(Request $request, Services $service)
    {
        $form = $this->createDeleteForm($service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($service);
            $em->flush();
        }

        return $this->redirectToRoute('services_index');
    }

    /**
     * Creates a form to delete a Services entity.
     *
     * @param Services $service The Services entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Services $service)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('services_delete', array('id' => $service->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
