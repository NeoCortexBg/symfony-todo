<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ProjectController extends Controller
{
    /**
     * @Route("/projects", name="projects")
     */
    public function projectsAction()
    {
		$repository = $this->getDoctrine()
			->getRepository('AppBundle:Project');

        return $this->render('project/projects.html.twig', array(
			'projects' => $repository->findAll(),
        ));
    }

    /**
     * @Route("/project/add", name="project_add")
     */
    public function addAction(Request $request)
    {
        $project = new Project();

		$form = $this->createFormBuilder($project)
			->add('name', 'text')
			->add('save', 'submit', array('label' => 'Create Porject'))
			->getForm();

		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($project);
			$em->flush();

			return $this->redirectToRoute('projects');
		}

        return $this->render('project/add.html.twig', array(
			'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/project/edit/{project_sid}", name="project_edit")
     */
    public function editAction(Request $request, $project_sid)
    {
		$repository = $this->getDoctrine()
			->getRepository('AppBundle:Project');

        $project = $repository->find($project_sid);
		if(!$project) {
			throw $this->createNotFoundException('The project does not exist');
		}

		$form = $this->createFormBuilder($project)
			->add('project_sid', 'hidden')
			->add('name', 'text')
			->add('save', 'submit', array('label' => 'Save Project'))
			->getForm();

		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($project);
			$em->flush();

			return $this->redirectToRoute('projects');
		}

        return $this->render('project/edit.html.twig', array(
			'form' => $form->createView(),
        ));
    }

    /**
	 * @Method("POST")
     * @Route("/project/delete/{project_sid}", name="project_delete")
     */
    public function deleteAction($project_sid)
    {
		$repository = $this->getDoctrine()
			->getRepository('AppBundle:Project');

        $project = $repository->find($project_sid);
		if(!$project) {
			throw $this->createNotFoundException('The project does not exist');
		}

		$em = $this->getDoctrine()->getManager();
		$em->remove($project);
		$em->flush();

		return $this->redirectToRoute('projects');
    }
}
