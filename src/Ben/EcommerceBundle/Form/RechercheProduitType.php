<?php

namespace Ben\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class RechercheProduitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

           $builder
            ->add('recherche',TextType::class,array('label'=>false,
                'attr'=>array('class'=>'input-medium search-query')))
           // ->add('rechercheTraitementAction',SubmitType::class, array('label' => 'Rechercher'))
           //    ->getForm();
        ;
    }
    
    function getName()
    {
        return 'Ben_EcommerceBundle_rechercheProduit';
    }
}
