<?php

namespace App\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZoneType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('duree')
            ->add('prix')

            ->add('Services','entity', array(
                'class' => 'AppBookingBundle:Services',
                'property'=>'title',
                'expanded'=>true,
                'multiple'=>true,
            ))

            ->add('description')

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\BookingBundle\Entity\Zone'
        ));
    }
}
