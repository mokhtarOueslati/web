<?php

namespace PI\FrontBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use PI\FrontBundle\Entity\Randonnee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class RandonneeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text',TextareaType::class,array('label' => 'Description','required' => false))
            ->add('destination')
            ->add('datedepart',\Symfony\Component\Form\Extension\Core\Type\DateTimeType::class, array(
                'data' => new \DateTime(),
                'years' => range (date('Y'),date('Y')+10)))

            ->add('places')
            ->add('file',FileType::class,array('label' => 'Telecharger une image','data_class' => null,'required' => false));
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
        return 'pi_frontbundle_Randonnee';
    }


}
