<?php

namespace App\Form;

use App\Entity\Peripherique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PeripheriqueFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', TextType::class, [
                'label'=> 'Type',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Type',
                    'required' => true,
                    'mapped' => false,
                ),
            ])
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
            ->add('notes', TextareaType::class, [
                'label'=> 'Notes',
                'attr'=> array(
                    'class' => '',
                    'placeholder' => 'Notes',
                    'required' => true,
                    'mapped' => false,
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
            'data_class' => Peripherique::class,
        ]);
    }
}
