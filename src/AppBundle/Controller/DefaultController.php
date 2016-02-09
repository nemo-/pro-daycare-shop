<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(UserType::class);
        $form->add('save', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();

            $this->getUserManager()->save($user);

            return $this->render('default/registerSuccessful.html.twig');
        }

        return $this->render('default/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \AppBundle\Manager\UserManager
     */
    protected function getUserManager()
    {
        return $this->get('user_manager');
    }
}
