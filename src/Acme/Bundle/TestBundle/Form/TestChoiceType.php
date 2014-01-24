<?php

namespace Acme\Bundle\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TestChoiceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addChilds($builder, 'trigger');
        $this->addChilds($builder, 'target');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'   => 'Acme\Bundle\TestBundle\Entity\Test',
            /*'other_choice' => [
                ['trigger' => 'type', 'target' => 'created', 'value' => 1],
                ['trigger' => 'type3', 'target' => 'num', 'value' => 3],
                ['trigger' => 'type2', 'target' => 'birthday', 'value' => 2],
                ['trigger' => 'enabled', 'target' => 'alarm', 'value' => true],
            ],*/
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_choice';
    }

    private function addChilds(FormBuilderInterface &$builder, $prefix)
    {
        $builder
            ->add(
                $prefix . '_choice',
                'choice',
                array(
                    'choices' => array('foo', 'bar', 'dur'),
                    'mapped'  => false,
                )
            )
            ->add(
                $prefix . '_multiple_choice',
                'choice',
                array(
                    'choices'  => array('foo', 'bar', 'dur'),
                    'mapped'   => false,
                    'multiple' => true,
                )
            )
            ->add(
                $prefix . '_expanded_choice',
                'choice',
                array(
                    'choices'  => array('foo', 'bar', 'dur'),
                    'mapped'   => false,
                    'expanded' => true,
                )
            )
            ->add(
                $prefix . '_multiple_expanded_choice',
                'choice',
                array(
                    'choices'  => array('foo', 'bar', 'dur'),
                    'mapped'   => false,
                    'multiple' => true,
                    'expanded' => true,
                )
            )
        ;
    }
}
