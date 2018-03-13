<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomDelArticle', TextType::class)
            ->add('status', ChoiceType::class, array(
                'choices' => array(
                    'Not New' => null,
                    'New' => 'New')
            ))
            ->add('image', TextType::class, ['required' => false])
            ->add('soldes', TextType::class, array('required' => false))
            ->add('prixAvant', MoneyType::class, array('currency' => '', 'required' => false))
            ->add('prixActuel', MoneyType::class, array('currency' => ''))
            ->add('taille', ChoiceType::class, array(
                'choices' => array(
                    'Choose the size' => null,
                    'S' => 'S',
                    'L' => 'L',
                    'M' => 'M',
                    'XL' => 'XL')
            ))
            ->add('color', ChoiceType::class, array(
                'choices' => array(
                    'Choose the color' => null,
                    'Red' => 'Red',
                    'Blue' => 'Blue',
                    'Green' => 'Green',
                    'Black' => 'Black',
                    'White' => 'White')
            ))
            ->add('collection', ChoiceType::class, array(
                'choices' => array(
                    'Choose the collection' => null,
                    'Summer' => 'Summer',
                    'Autumn' => 'Autumn',
                    'Winter' => 'Winter',
                    'Spring' => 'Spring')
            ))
            ->add('marque', TextType::class)
            ->add('description', TextareaType::class)
            ->add('detail', TextareaType::class)
            ->add('categorie', TextType::class)
            ->add('avaibility', ChoiceType::class, array(
                'choices' => array(
                    'Disponible' => true,
                    'Indisponible' => null)
            ))
            ->add('countdowndate', DateTimeType::class, array(
                'required' => false,
                'placeholder' => 'Select a countdown'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Products::class
        ));
    }
}