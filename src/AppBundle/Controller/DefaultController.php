<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sorties;
use AppBundle\Form\Type\SearchFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homePage")
     */
    public function indexAction(Request $request)
    {
        $sorties    = new Sorties();

        $form = $this->createForm(SearchFormType::class, $sorties);
        $form -> handleRequest($request);
        if ($form -> isSubmitted() && $form -> isValid() ) {
            dump($form -> getData() );
        }

        return $this->render('@App/default/index.html.twig',
            [
                'form' => $form->createView(),
            ]);
    }
}
