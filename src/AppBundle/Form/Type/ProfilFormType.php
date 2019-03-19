<?php
/**
 * Created by PhpStorm.
 * User: DWWM
 * Date: 19/03/2019
 * Time: 10:25
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfilFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pseudo', TextType::class)
            ->add('prenom', TextType::class)
            ->add('nom',TextType::class)
            ->add('telephone',TelType::class)
            ->add('email',EmailType::class)
            ->add('password',PasswordType::class)
            ->add('confirmation',PasswordType::class)
            ->add('ville',ChoiceType::class)
            ->add('photo',UrlType::class)

            ->add('enregistrer', SubmitType::class)
            ->add('annuler',SubmitType::class);
    }

}