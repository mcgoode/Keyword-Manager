<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceProviderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('provider', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Service Provider Name'
                ]
            ])
            ->add('shortcode', IntegerType::class,[
                'attr'=>[
                    'placeholder'=>'The providers shortcode, example 777111'
                ]
            ])
            ->add('active', ChoiceType::class,[
                'placeholder'=>'Is this a current service Provider?',
                'choices'=>[
                    'Yes'=>true,
                    'No'=>false
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ServiceProvider'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_serviceprovider';
    }


}
