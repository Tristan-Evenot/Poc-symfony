<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Serie;
use App\Entity\Utilisateur;
use Cassandra\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,['required' => true,])
            ->add('resume',TextareaType::class,['required' => false,])
            ->add('vignette')
            ->add('dateSortie',DateType::class, [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('episodeActuel')
            ->add('saisonActuelle')
            ->add('terminee')
            ->add('categorieId',EntityType::class,[
                'class'=> Categorie::class,
                'choice_label' => 'nom',
                'required' => true,])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
