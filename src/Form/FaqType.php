<?php


namespace App\Form;

use App\Entity\Faq;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FaqType extends AbstractType
{

    
    public function buildform(FormBuilderInterface $builder, array $option)
    {
        $builder
        ->add('questions', TextType::class)
        ->add('reponses', TextareaType::class);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Faq::class]);
    }
}