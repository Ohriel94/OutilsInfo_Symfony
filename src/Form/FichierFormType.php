<?php

namespace App\Form;

use App\Entity\Fichier;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichierFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {       
        $builder
            ->add('fileName', FileType::class, [
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fichier::class,
        ]);
    }
}
