<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $user = new User();
        $form = $this -> createForm(LoginFormType::class);
        $form -> handleRequest($request);

        return $this -> render('@App/default/index.html.twig',
                                [
                                    "form"          => $form -> createView(),
                                    "identifiant"   => $user -> getIdentifiant(),
                                    'password'      => $user -> getPassword(),
                                ]);
    }
}
