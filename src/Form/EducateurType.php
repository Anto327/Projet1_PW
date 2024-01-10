<?php

namespace App\Form;

use App\Entity\Educateur;
use App\Entity\Licencie;
use App\Entity\MailEdu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('isAdmin')
            ->add('licencie', EntityType::class, [
                'class' => Licencie::class,
'choice_label' => 'id',
            ])
            ->add('mailEdus', EntityType::class, [
                'class' => MailEdu::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Educateur::class,
        ]);
    }
}
