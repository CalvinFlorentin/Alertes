<?php

    namespace AppBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class PersonnePhysiqueType extends AbstractType {
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options) {
            $builder
                ->add('nomPersonne', TextType::class)
                ->add('prenomPersonne', TextType::class)
            ;
        }

        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver) {
            $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\PersonnePhysique'));
        }

        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix() {
            return 'appbundle_personnephysique';
        }


    }
