<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PokemonCaringType
 *
 * @package AppBundle\Form\Type
 */
class PokemonCaringType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pokemons', CollectionType::class, [
                    'entry_type'   => PokemonType::class,
                    'allow_add'    => true,
                    'by_reference' => false,
                    'label'        => 'Pokemons to be cared by User',
                ]

            );
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
                    'data_class'      => User::class,
                ]
            );
    }
}
