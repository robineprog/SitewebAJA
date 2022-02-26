<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('email', EmailType::class, [
            'label' => 'Votre Email',
            'attr' => [
                'class' => 'form-control',
                'style' => 'height: 100%; width:100%;'
            ]
        ])

        ->add('sujet', TextType::class,[                
            'attr' => [
                'style' => 'height: 100%; width:100%;',
                'label' => 'sujet',
                'class' => 'form-control'
            ]
        ])
        ->add('message', TextareaType::class,[
            'attr' => [
                'class' => 'form-control',
                'rows' => '3',
                'label' => 'Votre message'
                ]
        ])
        ->add('Envoyer', SubmitType::class, [
            'attr' => [
                'class' => ' d-flex btn btn-primary']
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
