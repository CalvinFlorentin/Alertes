<?php

    namespace AppBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class PersonneMoraleType extends AbstractType
    {
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder->add('nomOrganisme', TextType::class);
        }

        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'AppBundle\Entity\PersonneMorale'
            ));
        }

        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix()
        {
            return 'appbundle_personnemorale';
        }


    }
