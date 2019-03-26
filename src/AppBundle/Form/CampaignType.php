<?php

namespace AppBundle\Form;


use AppBundle\Entity\Product;
use AppBundle\Entity\ServiceProvider;
use AppBundle\Repository\ProductsRepository;
use AppBundle\Repository\ServiceProviderRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampaignType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class)
            ->add('product',EntityType::class,[
                'class'=>'AppBundle\Entity\Product',
                'query_builder'=> function (ProductsRepository $pr){
                    return $pr->findByActiveClientAndNotRemoved();
                },
                'choice_label'=>function($product){

                    /** @var Product $product */
                    return $product->getClient()->getName().' - '.$product->getName();
                },
            ])
            ->add('keyword', TextType::class)
            ->add('shortcode', EntityType::class,[
                'class'=>ServiceProvider::class,
                'query_builder'=> function( ServiceProviderRepository $providerRepository){
                    return $providerRepository->findByActiveAndNotRemoved();
                },
                'choice_label'=>function($provider){

                    /** @var ServiceProvider $provider*/
                    return $provider->getProvider(). ' - '.$provider->getShortcode();
                },


            ])
            ->add('startDate', DateType::class,[
                'widget'=>'single_text',
                'required' => false,
                'empty_data' => '',
            ])
            ->add('endDate', DateType::class,[
                'widget'=>'single_text',
                'required' => false,
                'empty_data' => '',
            ])
            ->add('active', ChoiceType::class,[
                'placeholder' => 'Is this campaign active?',
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ]
            ])
            ->add('save', SubmitType::class)
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Campaign'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_campaign';
    }


}
