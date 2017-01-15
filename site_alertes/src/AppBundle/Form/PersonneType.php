<?php

    namespace AppBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\CollectionType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class PersonneType extends AbstractType {
        public function buildForm(FormBuilderInterface $builder, array $options) {
            $builder
                ->add('personne', PersonnePhysiqueType::class)
                ->add('organisme', PersonneMoraleType::class)
                ->add('contacts', CollectionType::class, array(
                    'entry_type' => ContactType::class,
                    'allow_add' => true,
                    'allow_delete' => true
                ))
            ;
        }

        public function configureOptions(OptionsResolver $resolver) {

        }

        public function getName() {
            return 'app_bundle_personne_type';
        }
    }
