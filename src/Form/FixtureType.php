<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Competition;
use App\Entity\Fixture;
use App\Entity\Stadium;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FixtureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('homeScore')
            ->add('awayScore')
            ->add('datetime')
            ->add('status')
            ->add('homeTeam', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'shortName',
            ])
            ->add('awayTeam', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'shortName',
            ])
            ->add('stadium', EntityType::class, [
                'class' => Stadium::class,
                'choice_label' => 'name',
            ])
            ->add('competition', EntityType::class, [
                'class' => Competition::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fixture::class,
        ]);
    }
}
