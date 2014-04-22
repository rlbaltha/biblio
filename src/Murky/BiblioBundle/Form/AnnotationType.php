<?php

namespace Murky\BiblioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnnotationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annotation', 'ckeditor', array('config_name' => 'editor_default',))
            ->add('biblio', 'hidden')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Murky\BiblioBundle\Entity\Annotation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'murky_bibliobundle_annotation';
    }
}
