<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 28/03/2018
 * Time: 13:22
 */
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder

            ->add('name', TextType::class, array(
                'constraints' => array (
                    new NotBlank(),
                    new Length(array('min' =>4)),
                )
                ))
            ->add('email', EmailType::class, array(
                'constraints' => array (
                    new  NotBlank()
                )

            ))

            ->add('subject', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                    new Length(array('min'=>8)),
                )
            ))
            ->add('message', TextareaType::class, array(
                'constraints' => new NotBlank()
            ))

        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

        ));
    }
}