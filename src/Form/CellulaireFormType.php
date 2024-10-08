<?php

namespace App\Form;

use App\Entity\Cellulaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CellulaireFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque', TextType::class, [
                'label'=> 'Marque',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Marque',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('modele', TextType::class, [
                'label'=> 'Modèle',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Modèle',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('dateAcquisition', DateType::class, [
                'label'=> 'Date d\'aquisition',
                'format' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ',
                'input' => 'datetime_immutable',
                'property_path' => 'dateAcquisition',
                'html5' => false,
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée l\'année d\'aquisition seulement',
                    'required' => true,
                    'mapped' => false,
                ),
                'placeholder' => [
                    'year' => 'Annee', 'month' => 'Mois', 'day' => 'Jour',
                ],
            ])
            ->add('dateSortie', DateType::class, [
                'label'=> 'Date de sortie',
                'format' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ',
                'input' => 'datetime_immutable',
                'property_path' => 'dateSortie',
                'html5' => false,
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée l\'année de sortie seulement',
                    'required' => true,
                    'mapped' => false,
                ),
                'placeholder' => [
                    'year' => 'Annee', 'month' => 'Mois', 'day' => 'Jour',
                ],
            ])
            ->add('systeme', TextType::class, [
                'label'=> 'Système',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Système',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('cpu', TextType::class, [ 
                'label'=> 'CPU',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Processeur',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('gpu', TextType::class, [
                'label'=> 'GPU',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Carte Graphique',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('memoire', TextType::class, [
                'label'=> 'Mémoire',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée la valeur cummulée',
                ),
            ])
            ->add('stockage', TextType::class, [
                'label'=> 'Stockage',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée la valeur cummulée',
                ),
            ])
            ->add('cardSlot', TextType::class, [
                'label'=> 'SD Card',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée la valeur de la carte SD',
                ),
            ])
            ->add('notes', TextareaType::class, [
                'label'=> 'Notes',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Notes',
                ),
            ])
            ->add('confirmer', SubmitType::class, [
                'attr'=> array(
                    'class' => "uppercase mt-15 bg-blue-500 text-gray-100 text-lg w-3/5 mt-10 font-extrabold py-4 px-8 rounded-3xl"
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cellulaire::class,
            'csrf_protection' => false,
        ]);
    }
}
