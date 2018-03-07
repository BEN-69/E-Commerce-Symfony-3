<?php

namespace Ben\PagesBundle\Form;

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
            ->add('name',TextType::class , array('attr' => array('placeholder' => 'Votre Nom')) )
            ->add('email',EmailType::class , array('attr' => array('placeholder' => 'Votre Email')) )
            ->add('subject',null, array('attr' => array('placeholder' => 'Votre Sujet')))
            ->add('body',null,array('attr' => array('placeholder' => 'Votre Message','rows' => 4)));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\PagesBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ben_pagesbundle_contact';
    }


}
