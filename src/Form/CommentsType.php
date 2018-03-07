<?php
namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentsType extends AbstractType
{
    public function buildform(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('commentaires', TextareaType::class);
    }
    
    public function configurerOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           'data_class'=>Comments::class
        ));
    }
}