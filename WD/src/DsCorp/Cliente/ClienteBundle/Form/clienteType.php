<?php

namespace DsCorp\Cliente\ClienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class clienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razonSocial')
            ->add('rfc')
            ->add('telefono1')
            ->add('telefono2')
            ->add('email')
            ->add('paginaWeb')
            ->add('fechaCreacion')
            ->add('fechaModificacion')
            ->add('idCreacion')
            ->add('idModificacion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Cliente\ClienteBundle\Entity\cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_cliente_clientebundle_cliente';
    }
}
