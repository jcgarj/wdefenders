<?php

namespace DsCorp\Fabricante\FabricanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class procedenciaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaLlegada')
            ->add('numeroSerieFabricante')
            ->add('numeroSerieWarriors')
            ->add('fechaSalida')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Fabricante\FabricanteBundle\Entity\procedencia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_fabricante_fabricantebundle_procedencia';
    }
}
