<?php

namespace App\BookingBundle\Controller;

use App\BookingBundle\Entity\Horaire;
use App\BookingBundle\Form\UserserviceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BookingBundle\Entity\User;
use App\BookingBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBookingBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $nom = $form["nom"]->getData();
            $email = $form["email"]->getData();
            $prenom = $form["prenom"]->getData();
            $em->persist($user);
            $em->flush();
            $newuser = $em->getRepository('AppBookingBundle:User')
                ->findOneby(array('nom' => $nom,'prenom' => $prenom,'email' => $email));

                $horaire = new Horaire();
                $horaire->setIndexJour(1);
                $horaire->setStartTime(new \DateTime('08:00:00'));
                $horaire->setEndTime(new \DateTime('18:00:00'));
                $horaire->setUserId($newuser);
                $em->persist($horaire);
                $em->flush();
                $horaire = new Horaire();
                $horaire->setIndexJour(2);
                $horaire->setStartTime(new \DateTime('08:00:00'));
                $horaire->setEndTime(new \DateTime('18:00:00'));
                $horaire->setUserId($newuser);
                $em->persist($horaire);
                $em->flush();
                $horaire = new Horaire();
                $horaire->setIndexJour(3);
                $horaire->setStartTime(new \DateTime('08:00:00'));
                $horaire->setEndTime(new \DateTime('18:00:00'));
                $horaire->setUserId($newuser);
                $em->persist($horaire);
                $em->flush();
                $horaire = new Horaire();
                $horaire->setIndexJour(4);
                $horaire->setStartTime(new \DateTime('08:00:00'));
                $horaire->setEndTime(new \DateTime('18:00:00'));
                $horaire->setUserId($newuser);
                $em->persist($horaire);
                $em->flush();
                $horaire = new Horaire();
                $horaire->setIndexJour(5);
                $horaire->setStartTime(new \DateTime('08:00:00'));
                $horaire->setEndTime(new \DateTime('18:00:00'));
                $horaire->setUserId($newuser);
                $em->persist($horaire);
                $em->flush();
                $horaire = new Horaire();
                $horaire->setIndexJour(6);
                $horaire->setStartTime(null);
                $horaire->setEndTime(null);
                $horaire->setUserId($newuser);
                $em->persist($horaire);
                $em->flush();
                $horaire = new Horaire();
                $horaire->setIndexJour(7);
                $horaire->setStartTime(null);
                $horaire->setEndTime(null);
                $horaire->setUserId($newuser);
                $em->persist($horaire);
                $em->flush();
            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
    public function ajaxnewAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBookingBundle:User')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $nom = $form["nom"]->getData();
            $email = $form["email"]->getData();
            $prenom = $form["prenom"]->getData();
            $em->persist($user);
            $em->flush();
            $newuser = $em->getRepository('AppBookingBundle:User')
                ->findOneby(array('nom' => $nom, 'prenom' => $prenom, 'email' => $email));

            $horaire = new Horaire();
            $horaire->setIndexJour(1);
            $horaire->setStartTime(new \DateTime('08:00:00'));
            $horaire->setEndTime(new \DateTime('18:00:00'));
            $horaire->setUserId($newuser);
            $em->persist($horaire);
            $em->flush();
            $horaire = new Horaire();
            $horaire->setIndexJour(2);
            $horaire->setStartTime(new \DateTime('08:00:00'));
            $horaire->setEndTime(new \DateTime('18:00:00'));
            $horaire->setUserId($newuser);
            $em->persist($horaire);
            $em->flush();
            $horaire = new Horaire();
            $horaire->setIndexJour(3);
            $horaire->setStartTime(new \DateTime('08:00:00'));
            $horaire->setEndTime(new \DateTime('18:00:00'));
            $horaire->setUserId($newuser);
            $em->persist($horaire);
            $em->flush();
            $horaire = new Horaire();
            $horaire->setIndexJour(4);
            $horaire->setStartTime(new \DateTime('08:00:00'));
            $horaire->setEndTime(new \DateTime('18:00:00'));
            $horaire->setUserId($newuser);
            $em->persist($horaire);
            $em->flush();
            $horaire = new Horaire();
            $horaire->setIndexJour(5);
            $horaire->setStartTime(new \DateTime('08:00:00'));
            $horaire->setEndTime(new \DateTime('18:00:00'));
            $horaire->setUserId($newuser);
            $em->persist($horaire);
            $em->flush();
            $horaire = new Horaire();
            $horaire->setIndexJour(6);
            $horaire->setStartTime(null);
            $horaire->setEndTime(null);
            $horaire->setUserId($newuser);
            $em->persist($horaire);
            $em->flush();
            $horaire = new Horaire();
            $horaire->setIndexJour(7);
            $horaire->setStartTime(null);
            $horaire->setEndTime(null);
            $horaire->setUserId($newuser);
            $em->persist($horaire);
            $em->flush();


        }
        return new Response('Ajout est  effectué avec succès');

    }
    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm(new UserType(), $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }   /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editajaxuserAction(Request $request, $id)

    {
        if($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBookingBundle:User')->find($id);
            $entity->setNom($request->get("nom"));
            $entity->setPrenom($request->get("prenom"));
            $em->persist($entity);
            $em->flush();
        $response = new Response();
        return $response;
        }
        return false;

    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);
        if ($request->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
            $response->setContent( json_encode(array('etat'=>true)));

       }
        return $response;
    }
 /**
     * Deletes a User entity.
     *
     */
    public function AjaxSelectAction(Request $request,$id)
    {
        /*$em = $this->getDoctrine()->getManager();
        $user= $em->getRepository('AppBookingBundle:User')->find($id);
        $array_user=array();
        $array_user["id"]=array(); $array_user["nom"]=array();
        $array_user["prenom"]=array();$array_user["email"]=array();


        array_push($array_user["id"], $user->getId());
        array_push($array_user["nom"], $user->getNom());
        array_push($array_user["prenom"], $user->getPrenom());
        array_push($array_user["prenom"], $user->getEmail());

        $json = json_encode(array(
            'user' => $array_user,
        ));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($json);
        return $response;*/
        if ($this->container->get('request')->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $user = $em->getRepository('AppBookingBundle:User')->find($id);

            if (!$user) {
                throw $this->createNotFoundException('Unable to find Client entity.');
            }
            $editForm = $this->createForm(new UserType(), $user);
            $editFormservice = $this->createForm(new UserserviceType(), $user);
            $editForm->handleRequest($request);
            $editFormservice->handleRequest($request);
            return $this->container->get('templating')->renderResponse('user/cordonner.html.twig', array(
                'editForm' => $editForm->createView(),
                'editFormservice' => $editFormservice->createView(),
                'user'=>$user
            ));
        }
    }
    public function AjaxSelect1Action(Request $request,$id)
    {
        /*$em = $this->getDoctrine()->getManager();
        $user= $em->getRepository('AppBookingBundle:User')->find($id);
        $array_user=array();
        $array_user["id"]=array(); $array_user["nom"]=array();
        $array_user["prenom"]=array();$array_user["email"]=array();


        array_push($array_user["id"], $user->getId());
        array_push($array_user["nom"], $user->getNom());
        array_push($array_user["prenom"], $user->getPrenom());
        array_push($array_user["prenom"], $user->getEmail());

        $json = json_encode(array(
            'user' => $array_user,
        ));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($json);
        return $response;*/
        if ($this->container->get('request')->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $user = $em->getRepository('AppBookingBundle:User')->find($id);

            if (!$user) {
                throw $this->createNotFoundException('Unable to find Client entity.');
            }
            $editForm = $this->createForm(new UserType(), $user);
            $editFormservice = $this->createForm(new UserserviceType(), $user);
            $editForm->handleRequest($request);
            $editFormservice->handleRequest($request);
            return $this->container->get('templating')->renderResponse('user/cordonner1.html.twig', array(
                'editFormservice' => $editFormservice->createView(),
                'user'=>$user
            ));
        }
    }
    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
