<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoutiqueContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class,[
                'disabled' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nom', TextType::class,[                
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('prenom', TextType::class,[                
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => 'Votre Email',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('taille', ChoiceType::class, [
                'label' => 'Choisisez votre taille',
                'choices'  => [
                    'XS' => "XS",
                    'S' => "S",
                    'M' => "M",
                    'L' => "L",
                    'XL' => "XL",

                ]
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Demande spécifique',
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'width:100%; margin-bottom:5px;'
                ]
            ])
            ->add('valider', SubmitType::class,[
                'attr' => [
                    'class' => ' d-flex btn btn-primary'
                    ]
                    
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
