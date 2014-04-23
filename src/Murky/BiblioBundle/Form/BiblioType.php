<?php

namespace Murky\BiblioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BiblioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('pubInfo', 'ckeditor', array('config_name' => 'editor_default',))
            ->add('fileFormat')
            ->add('tags','entity', array('class' => 'MurkyBiblioBundle:Tag','property' => 'tag','multiple' => true, 'expanded' => true))
            ->add('authors','entity', array('class' => 'MurkyBiblioBundle:Author','property' => 'lastname','multiple' => true, 'expanded' => true))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Murky\BiblioBundle\Entity\Biblio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'murky_bibliobundle_biblio';
    }
}
