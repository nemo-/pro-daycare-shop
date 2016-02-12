<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Pokemon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PokemonType
 *
 * @package AppBundle\Form\Type
 */
class PokemonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trainer_name', TextType::class, [
                'label' => 'Trainer Name',
            ])
            ->add('pokemon_name', TextType::class, [
                'label' => 'Pokemon Name',
            ])
            ->add('current_level', IntegerType::class, [
                'label' => 'Current Level',
            ])
            ->add('final_level', IntegerType::class, [
                'label' => 'Final Level',
            ])
            ->add('ev_train', CheckboxType::class, [
                'label'    => 'EV Train',
                'required' => false,
            ])
            ->add('evolve', CheckboxType::class, [
                'label'    => 'Evolve',
                'required' => false,
            ])
            ->add('ev_to_train', TextType::class, [
                'label' => 'EV to train',
            ])
            ->add('rush_order', CheckboxType::class, [
                'label'    => 'Rush Order',
                'required' => false,
            ])
            ->add('move_to_keep', TextType::class, [
                'label' => 'Moves to keep',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                [
                    'csrf_protection' => false,
                    'data_class'      => Pokemon::class,
                ]
            );
    }
}
