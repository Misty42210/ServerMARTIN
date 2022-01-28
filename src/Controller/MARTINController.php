<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
