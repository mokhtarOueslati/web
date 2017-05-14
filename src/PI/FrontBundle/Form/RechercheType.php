<?php

namespace PI\FrontBundle\Form;

use PI\FrontBundle\Entity\Randonnee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('date1')

            ->add('Rechercher',SubmitType::class);

        //, FileType::class, array('label' => 'Telecharger une image'))//

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PI\FrontBundle\Entity\Randonnee'
        ));
        $resolver->setDefaults(array(
            'data_class' => Randonnee::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pi_frontbundle_publication';
    }


}
