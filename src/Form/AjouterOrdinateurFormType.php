<?php

namespace App\Form;

use App\Entity\Ordinateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjouterOrdinateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroSerie', NumberType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'S/N',
                    'required' => false,
                    'mapped' => false,
                ),
            ])
            // ->add('etatDisponible')
            ->add('marque', TextType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Marque',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('modele', TextType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Modèle',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('dateAcquisition', DateType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée l\'année d\'aquisition seulement',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->get('dateAcquisition', DateType::class)
               ->addModelTransformer(new CallbackTransformer(
                function($origDateAqui) {
                    return new \DateTimeImmutable($origDateAqui);
                },
                function($submittedDateAqui) {
                    $cleaned = strip_tags($submittedDateAqui, '<br><br/><p>');
                    
                    return str_replace('\n', '<br/>', $cleaned);
                }
            ) )
            ->add('dateSortie', DateType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée l\'année de sortie seulement',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('systeme', TextType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Système',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('cpu', TextType::class, [ 
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Processeur',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('gpu', TextType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Carte Graphique',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('memoire', NumberType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée la valeur cumulée des barrettes de ram',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('disques', TextType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Entrée la valeur individuelle de chaque disque séparé par \';\'',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
            ->add('notes', TextareaType::class, [
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Notes',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
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
