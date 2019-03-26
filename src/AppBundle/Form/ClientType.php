<?php

namespace AppBundle\Form;

use AppBundle\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('addressOne', TextType::class)
            ->add('addressTwo',TextType::class,[
                'required' => false
            ])
            ->add('city',TextType::class)
            ->add('state',TextType::class)
            ->add('zipFive',TextType::class)
            ->add('isActive', ChoiceType::class,[
                'placeholder' => 'Is this a current client?',
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ]
            ])
            ->add('save', SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_client';
    }


}
