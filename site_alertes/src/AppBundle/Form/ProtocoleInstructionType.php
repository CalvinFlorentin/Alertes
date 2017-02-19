<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProtocoleInstructionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', CollectionType::class, array(
                'entry_type' => IntegerType::class,
                'required' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ))
            ->add('validationInstruction', CollectionType::class, array(
                'entry_type' => IntegerType::class,
                'required' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ))
            ->add('protocole', ProtocoleType::class)
            ->add('instruction', CollectionType::class, array(
                'entry_type' => InstructionType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProtocoleInstruction'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_protocoleinstruction';
    }


}
