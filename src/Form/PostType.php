<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add(
                'description',
                TextareaType::class,
                [
                    'attr' => array('cols' => '5', 'rows' => '6')
                ]
            )
            ->add('pictures', FileType::class, [     
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => true,
                'allow_extra_fields'=> true
            ])
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'Envoyer'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
