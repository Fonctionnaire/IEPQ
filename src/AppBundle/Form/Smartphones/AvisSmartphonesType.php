<?php

namespace AppBundle\Form\Smartphones;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisSmartphonesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('avis', TextareaType::class, array(
                'required' => true,
                'attr' => ['class' => 'textarea-avis']
            ))
            ->add('note', IntegerType::class, array(
                'required' => true,
                'attr' => array(
                    'min' => 0,
                    'max' => 10,
                    'placeholder' => 'Note de 0 à 10',

                )
            ))
            ->add('lieuAchat', TextType::class, array(
                'required' => false,
                'attr' => ['placeholder' => 'Champ facultatif']
            ))
            ->add('valider', SubmitType::class, array(
                'attr' => ['class' => 'waves-effect waves-light btn light-blue lighten-2']
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Smartphones\AvisSmartphones'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_smartphones_avissmartphones';
    }


}
