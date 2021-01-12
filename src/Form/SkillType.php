<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('html', CheckboxType::class)
            ->add('css', CheckboxType::class)
            ->add('bootstrap', CheckboxType::class)
            ->add('php', CheckboxType::class)
            ->add('symfony', CheckboxType::class)
            ->add('git', CheckboxType::class)
            ->add('js', CheckboxType::class)
            ->add('sql', CheckboxType::class)
            ->add('composer', CheckboxType::class)
            ->add('wordpress', CheckboxType::class)
            ->add('uml', CheckboxType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            /* 'data_class' => function (FormInterface $form) {
                return new Post($form->get('skills')->getData()); 
            },*/
        ]);
    }
}
