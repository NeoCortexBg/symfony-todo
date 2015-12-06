<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
			->add('todo_sid', 'hidden')
			->add('priority', 'text')
			->add('project', 'entity', array(
						'required' => false,
						'placeholder' => '--- Project ---',
						'class' => 'AppBundle:Project',
						'choice_label' => 'name',
						'empty_data'  => null,
					)
				)
			->add('todo_status', 'entity', array(
						'class' => 'AppBundle:TodoStatus',
						'choice_label' => 'name',
						'empty_data'  => null,
					)
				)
			->add('text', 'textarea')
			->add('save', 'submit', array('label' => 'Add'))
		;
    }

    public function getName()
    {
        return 'todo';
    }
}
