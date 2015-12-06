<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
			->setMethod('POST')
			->add('email', 'text', array(
				'attr' => array(
					'placeholder' => 'Email address',
				)
			))
			->add('password', 'password', array(
				'attr' => array(
					'placeholder' => 'Password',
				)
			))
			->add('confirm_password', 'password', array(
				'attr' => array(
					'placeholder' => 'Confirm password',
				)
			))
			->add('register', 'submit', array('label' => 'Register'))
		;
    }

    public function getName()
    {
        return 'register';
    }
}
