<?php
/**
 * Created by PhpStorm.
 * User: DWWM
 * Date: 19/03/2019
 * Time: 11:07
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Participants;
use AppBundle\Entity\Sites;
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
        $particpant = new Participants();
        $site_test = new Sites();
        $form = $this->createForm(ProfilFormType::class, $particpant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
/*            $file = $particpant->getPhoto();

            $filename = $this->generateUniqueFileName(). '.' .$file->guessExtension();

            $file->move($this->getParameter('image_directory'), $filename);

            $particpant->setPhoto($filename);*/

            /*$site = $form->get('sitesNomSite')->getData();

            $particpant->setSitesNomSite($site);*/
            $particpant -> setAdministrateur(false);
            $particpant -> setActif(false);
            $particpant -> setPhoto("");
            dump($form -> getData() );

            $em=$this->getDoctrine()->getManager();
            $em->persist($particpant);
            $em->flush();

            return $this->redirect($this->generateUrl('homePage'));
        }

        return $this->render('@App/profil/profil.html.twig' ,
            [
                'form' => $form->createView(),
                'pseudo' => $particpant -> getPseudo(),
                'prenom' => $particpant -> getPrenom(),
                'nom' => $particpant -> getNom(),
                'telephone' => $particpant -> getTelephone(),
                'mail' => $particpant -> getMail(),
                'motDePasse' => $particpant -> getMail(),
                'site' => $site_test -> getNoSite()
            ]);
    }
}