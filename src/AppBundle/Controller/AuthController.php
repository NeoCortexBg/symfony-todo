<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class AuthController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
		$form = $this->container->get('form.factory')->create('login');

		$authenticationUtils = $this->get('security.authentication_utils');

		$form->get('email')->setData($authenticationUtils->getLastUsername());

        return $this->render('auth/login.html.twig', array(
			'form' => $form->createView(),
//			'last_username' => $authenticationUtils->getLastUsername(),
			'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
		$user = new User();
		$form = $this->container->get('form.factory')->create('register', $user);

		$form->handleRequest($request);
		if($form->isValid()) {

            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

			$this->get('session')->getFlashBag()->add('success', 'Registration successful');

			return $this->redirectToRoute('login');
		}

        return $this->render('auth/register.html.twig', array(
			'form' => $form->createView(),
        ));
    }
}
