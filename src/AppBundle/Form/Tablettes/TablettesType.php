<?php

namespace AppBundle\Form\Tablettes;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TablettesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', TextType::class)
            ->add('marque', EntityType::class, array(
                'class' => 'AppBundle\Entity\Tablettes\MarquesTablette',
                'choice_label' => 'marque'
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
            'data_class' => 'AppBundle\Entity\Tablettes\Tablettes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tablettes_tablettes';
    }


}
