<?php
/**
 * Created by PhpStorm.
 * User: DWWM
 * Date: 19/03/2019
 * Time: 17:10
 */

namespace AppBundle\Form\Type;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sitesNoSite',EntityType::class,  [
                                                                        'attr' => [
                                                                            'class' => 'siteInput'
                                                                        ],
                                                                        'class' => 'AppBundle:Sites',
                                                                        'choice_label' => 'nomSite',
                                                                        'label' => 'Site',
                                                                    ])
                ->add('datedebut',DateType::class,
                                                            [
                                                                'attr' => [
                                                                    'class' => 'datedebut'
                                                                ],
                                                                'label' => 'Entre'
                                                            ])
                ->add('datecloture', DateType::class,
                                                                [
                                                                    'attr' => [
                                                                        'class' => 'datecloture'
                                                                    ],
                                                                    'label' => 'Et'
                                                                ])

                ->add('rechercher', SubmitType::class);
    }
}