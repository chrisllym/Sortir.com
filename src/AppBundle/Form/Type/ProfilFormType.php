<?php
/**
 * Created by PhpStorm.
 * User: DWWM
 * Date: 19/03/2019
 * Time: 10:25
 */

namespace AppBundle\Form\Type;


use AppBundle\Entity\Participants;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pseudo', TextType::class, ['required' => true])
            ->add('prenom', TextType::class, ['required' => true])
            ->add('nom',TextType::class, ['required' => true])
            ->add('telephone',TelType::class, ['required' => true])
            ->add('mail',EmailType::class, ['required' => true])
            ->add('motDePasse',RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Confirmation'],
            ])
            ->add('sitesNomSite',EntityType::class, [
                'class' => 'AppBundle:Sites',
                'choice_label' => 'nomSite',
//                'choice_value' => 'nomSite',
                'label' => 'Site',
            ])
            ->add('photo',FileType::class)

            ->add('enregistrer', SubmitType::class)
            ->add('annuler',ButtonType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participants::class
        ]);
    }

}