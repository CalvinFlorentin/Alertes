<?php

    namespace AppBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class ContactType extends AbstractType
    {
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('email', EmailType::class)
                ->add('telephone', TextType::class, array('required' => false) )
                ->add('adresse', TextType::class, array('required' => false) )
                ->add('codePostal',  TextType::class, array('required' => false) )
                ->add('ville', TextType::class, array('required' => false) )
                ->add('personne', PersonnePhysiqueType::class, array('required' => false) )
                ->add('organisme', PersonneMoraleType::class, array('required' => false) );
        }

        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'AppBundle\Entity\Contact'
            ));
        }

        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix()
        {
            return 'appbundle_contact';
        }


    }
