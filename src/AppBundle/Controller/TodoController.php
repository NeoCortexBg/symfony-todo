<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Todo;

class TodoController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
		$repository = $this->getDoctrine()
			->getRepository('AppBundle:Todo');

		if($request->isMethod('POST')) {
			$todo_sid = $request->request->get('todo')['todo_sid'];
			if(!empty($todo_sid)) {
				$todo = $repository->find($todo_sid);
				if(!$todo) {
					return $this->redirect('/');
				}
			}
		}
		if(!isset($todo)) {
			$todo = new Todo();
		}

		$formFactory = $this->container->get('form.factory');

		$form = $formFactory->create(new \AppBundle\Form\Type\TodoType(), $todo);

		$form->handleRequest($request);

		if($request->isMethod('POST')) {
			if($form->isValid()) {
				
				$em = $this->getDoctrine()->getManager();
				$em->persist($todo);
				$em->flush();

				return $this->redirect($_SERVER['REQUEST_URI']);
			}
		}

		$filterForm = $formFactory->create('filter');
		$filterForm->handleRequest($request);
		$filter = array();
		if($filterForm->isValid()) {
			$filter = $filterForm->getData();
		}
//		ppv($repository->findByFilter($filter));
//		die();

//		$todos = $repository->findAll();
		$todos = $repository->findByFilter($filter);
		foreach($todos as $k => $t) {
			$todos[$k]->form = $formFactory->create(new \AppBundle\Form\Type\TodoType(), $t);
//			ppv($todos[$k]->form);
//			ppv($todos[$k]->form->getChildren());
//			$reflectionClass = new \ReflectionClass($todos[$k]->form->createView()->children['project_sid']->vars['is_selected']);
//			$reflectionFunction = new \ReflectionFunction($todos[$k]->form->createView()->children['project_sid']->vars['is_selected']);
//			ppv($todos[$k]->form->createView()->children['project_sid']->vars['is_selected']);
//			ppv($reflectionClass->getFileName());
//			ppv($reflectionFunction->getFileName());
//			die();
		}

        return $this->render('todo/index.html.twig', array(
			'todos' => $todos,
			'form' => $form,
			'filterForm' => $filterForm->createView(),
        ));
    }
}
