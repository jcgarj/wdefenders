<?php

namespace DsCorp\Cliente\ClienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class direccion_clienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('calle')
            ->add('numeroExt')
            ->add('numeroInt')
            ->add('colonia')
            ->add('codigoPostal')
            ->add('deleMuni')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Cliente\ClienteBundle\Entity\direccion_cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_cliente_clientebundle_direccion_cliente';
    }
}
