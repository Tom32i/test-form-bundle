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
            ->add('name')
            ->add('description')
            ->add('enabled')
            ->add('type', 'choice', array('choices' => array('foo', 'bar', 'dur'), 'expanded' => true))
            ->add('type2', 'choice', array('choices' => array('foo', 'bar', 'dur'), 'expanded' => true, 'multiple' => true, 'mapped' => false))
            ->add('created')
            ->add('num')
            ->add('birthday')
            ->add('alarm')
            ->add('price')
            ->add('test', new TestTypeEmbed, array('mapped' => false))
            ->add(
                'tests',
                'collection',
                array(
                    'type'         => new TestTypeEmbed,
                    'mapped'       => false,
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'label_add'    => true,
                    'label_delete' => true,
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
            'data_class' => 'Acme\Bundle\TestBundle\Entity\Test'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_bundle_testbundle_test';
    }
}
