<?php
/**
 * Created by PhpStorm.
 * User: vin-d
 * Date: 19/03/2019
 * Time: 12:16
 */

namespace AppBundle\Controller;



use AppBundle\Entity\Participants;
use AppBundle\Form\Type\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/login",
     *     name="login",
     *     methods={"POST", "GET"}
     *     )
     */
    public function loginAction(Request $request) {
        $participant = new Participants();
        $form = $this -> createForm(LoginFormType::class, $participant);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid() ) {
            dump($form -> getData() );
        }
        return $this -> render('@App/login.html.twig',
            [
                "form"      => $form        -> createView(),
                "username"    => $participant -> getUsername(),
                "password"    => $participant -> getPassword(),
            ]);
    }
}