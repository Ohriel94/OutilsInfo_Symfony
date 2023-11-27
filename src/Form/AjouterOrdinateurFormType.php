<?php

namespace App\Form;

use App\Entity\Ordinateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AjouterOrdinateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroSerie', NumberType::class, [])
            // ->add('etatDisponible')
            ->add('marque', TextType::class, [])
            ->add('modele', TextType::class, [])
            ->add('dateAcquisition', DateType::class, [])
            ->add('dateSortie', DateType::class, [])
            ->add('systeme', TextType::class, [])
            ->add('cpu', TextType::class, [])
            ->add('gpu', TextType::class, [])
            ->add('memoire', NumberType::class, [])
            ->add('disques', TextType::class, [])
            ->add('notes', TextareaType::class, [])
            // ->add('usager')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ordinateur::class,
        ]);
    }
}
