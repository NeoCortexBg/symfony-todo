<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//		ppv($options);
		$builder
			->setMethod('GET')
			->add('order_by', 'choice', array(
					'choices'  => array(
						"Date Created" => 'date_created',
						"Priority" => 'priority',
						"Status" => 'todo_status_sid',
						"Project" => 'project_sid',

					),
					// *this line is important*
					'choices_as_values' => true,

					)
				)
			->add('order_dir', 'choice', array(
					'choices'  => array(
						"Desc" => 'desc',
						"Asc" => 'asc',
					),
					'choices_as_values' => true,
					)
				)
			->add('project', 'entity', array(
						'required' => false,
						'placeholder' => '--- Project ---',
						'class' => 'AppBundle:Project',
						'choice_label' => 'name',
						'empty_data'  => null,
					)
				)
			->add('todo_status', 'entity', array(
						'required' => false,
						'class' => 'AppBundle:TodoStatus',
						'placeholder' => '--- Status ---',
						'choice_label' => 'name',
						'empty_data'  => null,
					)
				)
			->add('filter', 'submit', array('label' => 'Filter'))
		;
    }

    public function getName()
    {
        return 'filter';
    }
}
