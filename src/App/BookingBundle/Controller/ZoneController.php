<?php

namespace App\BookingBundle\Controller;

use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BookingBundle\Entity\Zone;
use App\BookingBundle\Form\ZoneType;

/**
 * Zone controller.
 *
 */
class ZoneController extends Controller
{
    /**
     * Lists all Zone entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $zones = $em->getRepository('AppBookingBundle:Zone')->findAll();

        return $this->render('zone/index.html.twig', array(
            'zones' => $zones,
        ));
    }

    /**
     * Creates a new Zone entity.
     *
     */
    public function newAction(Request $request)
    {
        $zone = new Zone();
        $form = $this->createForm(new ZoneType(), $zone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();

            return $this->redirectToRoute('zone_show', array('id' => $zone->getId()));
        }

        return $this->render('zone/new.html.twig', array(
            'zone' => $zone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Zone entity.
     *
     */
    public function showAction(Zone $zone)
    {
        $deleteForm = $this->createDeleteForm($zone);

        return $this->render('zone/show.html.twig', array(
            'zone' => $zone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Zone entity.
     *
     */
    public function editAction(Request $request, Zone $zone)
    {
        $deleteForm = $this->createDeleteForm($zone);
        $editForm = $this->createForm(new ZoneType(), $zone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();

            return $this->redirectToRoute('zone_edit', array('id' => $zone->getId()));
        }

        return $this->render('zone/edit.html.twig', array(
            'zone' => $zone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Zone entity.
     *
     */
    public function deleteAction(Request $request, Zone $zone)
    {
        $form = $this->createDeleteForm($zone);
        $form->handleRequest($request);

            $em = $this->getDoctrine()->getManager();
            $em->remove($zone);
            $em->flush();


        return $this->redirectToRoute('services_index');
    }
    public function getuserbyserviceAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $zones = $em->getRepository('AppBookingBundle:Zone')->getZoneByService($id);
        $array_user = array();
        $array_user["id"] = array();
        $array_user["title"] = array();


        for ($i = 0; $i < count($zones); $i++) {

        array_push($array_user["id"], $zones[$i]->getId());
        array_push($array_user["title"], $zones[$i]->getTitle());
        }
        $json = json_encode(array(
            'zones' => $array_user,
        ));

        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($json);
        return $response;

    }  /*  public function deletezoneinserviceAction($id,$idservices)
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('AppBookingBundle:Services')->find($idservices);

        $services->removeZone($id); //make sure the removeGroup method is defined in your User model.
        $em->persist($services);
        $em->flush();
        return $this->redirectToRoute('services_index');
    }*/

    /**
     * Creates a form to delete a Zone entity.
     *
     * @param Zone $zone The Zone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Zone $zone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zone_delete', array('id' => $zone->getId())))
            ->getForm()
        ;
    }
}
