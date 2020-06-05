<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Cycle;
use App\Entity\Etablissement;
use App\Entity\Specialite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('semestre')
            ->add('description')
            ->add('documentFile', FileType::class, [
                'label' => 'Choisissez un fichier',
            ])
            ->add('etablissement', EntityType::class, [
                'class' => Etablissement::class,
                'choice_label' => 'libelleCourt'
            ])
            ->add('cycles', EntityType::class, [
                'class'        => Cycle::class,
                'choice_label' => 'libelle',
                'multiple'     => true,
                'attr'         => ['class' => 'select2'],
            ])
            ->add('specialites', EntityType::class, [
                'class'        => Specialite::class,
                'choice_label' => 'libelle',
                'multiple'     => true,
                'attr'         => ['class' => 'select2'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }
}
