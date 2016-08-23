<?php

namespace App\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoraireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('indexJour')
            ->add('startTime', 'time')
            ->add('endTime', 'time')
            ->add('user_id','entity', array(
                'class' => 'AppBookingBundle:User',
                'property'=>'nom',
                'expanded'=>false,
                'multiple'=>false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\BookingBundle\Entity\Horaire'
        ));
    }
}
