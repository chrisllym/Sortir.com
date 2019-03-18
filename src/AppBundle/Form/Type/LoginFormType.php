<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder        ->add('identifiant', TextType::class)
                        ->add('password', PasswordType::class)


                        ->add('connexion', SubmitType::class)
                        ->add('remember', CheckboxType::class)
                        ->add('forget', UrlType::class);
    }
}