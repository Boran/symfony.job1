<?php
// src/bpp/Test1Bundle/Form/Type/JobType.php
namespace bpp\Test1Bundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class JobType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
         $resolver->setDefaults(array(
            'data_class' => 'Bpp\Test1Bundle\Entity\Job',
         )); // form needs to know the name of class with underlying data
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('job', 'integer');
        $builder->add('CustCode', 'text');
        $builder->add('lastchange', 'date', array(
              'label'=>'Last Change',
              'required'=>true,
            ));
        $builder->add('comment', 'text', array(
              'label'=>'Comment (not saved)',
              'property_path'=>false,   // not in the DB
            ));
    }

    public function getName()
    {
        return 'job';
    }
}