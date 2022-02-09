<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;

class MARTINController extends AbstractController
{
    /**
     * @Route("/martin", name="martin")
     */
    public function index(): Response
    {
        return $this->render('martin/index.html.twig', [
            'controller_name' => 'MARTINController',
        ]);
    }
    /**
     * @Route("/enregistrement", name="enregistrement")
     */
    public function enregistrement(): Response
    {
        return $this->render('martin/enregistrement.html.twig', [
            'controller_name' => 'MARTINController',
        ]);
    }
    /**
     * @Route("/creeruti", name="creeruti")
     */
    public function creeruti(Request $request,EntityManagerInterface $manager): Response
    {   
        $login = $request->get("pseudo");
        $password = $request->request->get("pass");
        $password= (password_hash($password, PASSWORD_DEFAULT));

        $monUtilisateur = new Utilisateur ();
        $monUtilisateur -> setLogin($login);
        $monUtilisateur -> setPassword($password);
        $manager -> persist($monUtilisateur);

        $manager -> flush ();

        return $this->redirectToRoute ('enregistrement');
    }
    /**
     * @Route("/srv/login", name="login")
     */
    public function login(Request $request,EntityManagerInterface $manager): Response
    {
        $login = $request->get("pseudo");
        $password = $request->request->get("pass");
        $reponse = $manager -> getRepository(Utilisateur :: class) -> findOneBy([ 'login' => $login]);
        if ($reponse==NULL)
            $message= "Vous n'etes pas present dans la base de donnees";
        else
            $code=$reponse -> getPassword();
            if (password_verify( $password, $code))
                $message = "vous avez reussi a vous connecter";
            else
                $message = "pas le bon mot de passe";
        return $this->render('martin/login.html.twig', [
            'login' =>$login,
            'password' =>$password,
            'message'=> $message,
        ]);
    }
}