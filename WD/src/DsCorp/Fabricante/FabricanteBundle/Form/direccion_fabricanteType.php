<?php

namespace DsCorp\Fabricante\FabricanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class direccion_fabricanteType extends AbstractType
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
            'data_class' => 'DsCorp\Fabricante\FabricanteBundle\Entity\direccion_fabricante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_fabricante_fabricantebundle_direccion_fabricante';
    }
}
