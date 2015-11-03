<?php

namespace DsCorp\Personal\PersonalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class personalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apePat')
            ->add('apeMat')
            ->add('telefono1')
            ->add('email')
            ->add('fechaCreacion')
            ->add('dechaModificacion')
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
            'data_class' => 'DsCorp\Personal\PersonalBundle\Entity\personal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_personal_personalbundle_personal';
    }
}
