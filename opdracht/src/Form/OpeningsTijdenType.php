<?php

namespace App\Form;

use App\Entity\OpeningsTijden;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpeningsTijdenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Dag')
            ->add('OpenTijd')
            ->add('DichtTijd')
            ->add('Restaurant_ID')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OpeningsTijden::class,
        ]);
    }
}
