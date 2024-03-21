<?php

namespace App\Form;

use App\Entity\Ordinateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class OrdinateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque', TextType::class, [
                'required' => true,
                'label'=> 'Marque',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Marque',
                ),
            ])
            ->add('modele', TextType::class, [
                'required' => true,
                'label'=> 'Modèle',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Modèle',
                ),
            ])
            ->add('dateAcquisition', DateType::class, [
                'required' => false,
                'label'=> 'Date d\'aquisition',
                'format' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ',
                'input' => 'datetime_immutable',
                'property_path' => 'dateAcquisition',
                'html5' => false,
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée l\'année d\'aquisition seulement',
                ),
                'placeholder' => [
                    'year' => 'Annee', 'month' => 'Mois', 'day' => 'Jour',
                ],
            ])
            ->add('dateSortie', DateType::class, [
                'required' => false,
                'label'=> 'Date de sortie',
                'format' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ',
                'input' => 'datetime_immutable',
                'property_path' => 'dateSortie',
                'html5' => false,
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée l\'année de sortie seulement',
                ),
                'placeholder' => [
                    'year' => 'Annee', 'month' => 'Mois', 'day' => 'Jour',
                ],
            ])
            ->add('systeme', TextType::class, [
                'required' => false,
                'label'=> 'Système',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Système',  
                ),
            ])
            ->add('cpu', TextType::class, [
                'required' => false,
                'label'=> 'CPU',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Processeur',
                ),
            ])
            ->add('gpu', TextType::class, [
                'required' => false,
                'label'=> 'GPU',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Carte Graphique',
                ),
            ])
            ->add('memoire', IntegerType::class, [
                'required' => false,
                'label'=> 'Mémoire',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée la valeur individuelle de chaque disque séparé par \';\'',
                ),
            ])
            ->add('disques', IntegerType::class, [
                'required' => false,
                'label'=> 'Disques',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée la valeur individuelle de chaque disque séparé par \';\'',
                ),
            ])
            ->add('notes', TextareaType::class, [
                'required' => false,
                'label'=> 'Notes',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Notes',
                ),
            ])
            ->add('facture', FileType::class, [
                'required' => false,
                'label'=> 'Facture (PDF)',
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
                'attr'=> array(
                    'class' => '',
                )
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
            'data_class' => Ordinateur::class,
            'csrf_protection' => false,
        ]);
    }
}
