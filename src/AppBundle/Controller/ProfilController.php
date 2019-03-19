<?php
/**
 * Created by PhpStorm.
 * User: DWWM
 * Date: 19/03/2019
 * Time: 11:07
 */

namespace AppBundle\Controller;


use AppBundle\Form\Type\ProfilFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends Controller
{
    /**
     * @Route("/profil", name="monProfil", methods={"POST", "GET"}
     *     )
     */
    public function afficherProfil(Request $request)
    {
        $form = $this->createForm(ProfilFormType::class);

        $form->handleRequest($request);

        return $this->render('profil/profil.html.twig' ,
            ['form' => $form->createView()]);
    }
}