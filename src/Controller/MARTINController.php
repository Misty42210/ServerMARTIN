<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/srv/login", name="login")
     */
    public function login(Request $request): Response
    {
        $login = $request->get("pseudo");
        $password = $request->request->get("pass");
        if ($login=="root" && $password=="toor")
            $message = "vous avez reussi a vous connecter";
        else
        $message = "pas le bon identifiant ou mot de passe";
        return $this->render('martin/login.html.twig', [
            'login' =>$login,
            'password' =>$password,
            'message'=> $message,
        ]);
    }
}