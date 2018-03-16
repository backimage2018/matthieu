<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
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
            ->add('status', ChoiceType::class, ['choices' => ['Not New' => null,'New' => 'New']])
            ->add('image', ImageType::class)
            ->add('soldes', TextType::class, ['required' => false])
            ->add('prixAvant', MoneyType::class, ['currency' => '', 'required' => false])
            ->add('prixActuel', MoneyType::class, ['currency' => ''])
            ->add('taille', ChoiceType::class, ['choices' => ['Choose the size' => null,'S' => 'S','L' => 'L','M' => 'M','XL' => 'XL']])
            ->add('color', ChoiceType::class, ['choices' => ['Choose the color' => null,'Red' => 'Red','Blue' => 'Blue','Green' => 'Green','Black' => 'Black','White' => 'White']])
            ->add('collection', ChoiceType::class, ['choices' => ['Choose the collection' => null,'Summer' => 'Summer','Autumn' => 'Autumn','Winter' => 'Winter','Spring' => 'Spring']])
            ->add('marque', ChoiceType::class, ['choices' => ['Choose the brand' => null,'E-SHOP' => 'E-SHOP','DOMINA' => 'DOMINA','SWAGGY' => 'SWAGGY','CRITICAL FAIL' => 'CRITICAL FAIL']])
            ->add('description', TextareaType::class)
            ->add('detail', TextareaType::class)
            ->add('categorie', ChoiceType::class, ['choices' => ['Choose the category' => null,'Bags' => 'Bags','Watch' => 'Watch','Shoes' => 'Shoes','Divers' => 'Divers']])
            ->add('avaibility', ChoiceType::class, ['choices' => ['Disponible' => true,'Indisponible' => null]])
            ->add('countdowndate', DateTimeType::class, ['required' => false,'placeholder' => 'Select a countdown']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Products::class]);
    }
}