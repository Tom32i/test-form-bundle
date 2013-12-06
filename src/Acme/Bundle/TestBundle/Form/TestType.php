<?php

namespace Acme\Bundle\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TestType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'common.name', 'help' => true))
            ->add('description', null, array('help' => true))
            ->add('enabled')
            ->add(
                'type',
                'choice',
                array(
                    'choices' => array('foo', 'bar', 'dur'),
                    'expanded' => false
                )
            )
            ->add('type2', 'choice', array('choices' => array('foo', 'bar', 'dur'), 'expanded' => true, 'multiple' => true, 'mapped' => false))
            ->add('created')
            ->add('num')
            ->add('birthday')
            ->add('alarm')
            ->add('price')
            ->add('parent', new TestTypeEmbed)
            ->add(
                'children',
                'collection',
                array(
                    'type'         => new TestTypeEmbed,
                    'allow_add'    => true,
                    'allow_delete' => true,
                )
            )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'   => 'Acme\Bundle\TestBundle\Entity\Test',
            'other_choice' => ['trigger' => 'type', 'target' => 'created', 'value' => 2],
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test';
    }
}
