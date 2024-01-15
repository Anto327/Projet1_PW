<?php

namespace App\Form;

use App\Entity\Educateur;
use App\Entity\MailEdu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailEduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateEnvoi')
            ->add('objet')
            ->add('message')
            ->add('educateurs', EntityType::class, [
                'class' => Educateur::class,
                'choice_label' => function (Educateur $educateur) {
                    return $educateur->getLicencie()->getNom() . ' ' . $educateur->getLicencie()->getPrenom();
                },
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MailEdu::class,
        ]);
    }
}
