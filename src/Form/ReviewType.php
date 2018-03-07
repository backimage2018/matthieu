<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReviewType extends AbstractType
{
    
    
    public function buildform(FormBuilderInterface $builder, array $option)
    {
        $builder
        ->add('message', TextareaType::class);
    }
    
    public function configurationOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault(array(
            'data_class'=> Review::class
        ));
    }
}