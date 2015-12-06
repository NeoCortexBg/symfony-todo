<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
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
			->add('login', 'submit', array('label' => 'Login'))
		;
    }

    public function getName()
    {
        return 'login';
    }
}
