<?php

namespace App\Form;

use App\Entity\ArticlesBoutique;
use ContainerLPdA1lz\getFosCkEditor_Form_TypeService;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


class ArticlesBoutiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class)
            
            ->add('description', CKEditorType::class)
            ->add('prix', MoneyType::class)
            ->add('featured_image',TextType::class)
            ->add('images', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
            ->add('categorie', ChoiceType::class, [
                'choices'  => [
                    'Eau Libre' => "Eau Libre",
                    'Vélo' => "Vélo",
                    'Course à pied' => "Course à pied",
                    'petites annonces' =>"Petites Annonces"
                ],
            ])
            ->add('valider', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ArticlesBoutique::class,
        ]);
    }
}
