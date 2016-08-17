<?php

namespace App\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Erreur ! La confirmation du mot de passe ne correspond pas .'
            ))
            ->add('departement')
            ->add('isActive')
            ->add('photo')
            ->add('roles', 'choice', array('choices' =>
                array(
                    'ROLE_GESTION_RDV' => 'Géstion des RDV',
                    'ROLE_GESTION_USERS' => 'Gestion des Utilisateurs',
                    'ROLE_GESTION_PROSPECTS' => 'Gestion des prospets',
                    'ROLE_GESTION_CENTRES' => 'Gestion des centres',
                    'ROLE_GESTION_CALENDRIERS' => 'Gestion des calendriers',
                    'ROLE_GESTION_CAISSE' => 'Gestion de caisses ',
                    'ROLE_GESTION_CLIENTS' => 'Gestion des Clients',
            ),

                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'attr' => array('class' => 'checkbox i-checks'),
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\BookingBundle\Entity\User'
        ));
    }
}
