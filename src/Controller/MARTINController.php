<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MARTINController extends AbstractController
{
    /**
     * @Route("/m/a/r/t/i/n", name="m_a_r_t_i_n")
     */
    public function index(): Response
    {
        return $this->render('martin/index.html.twig', [
            'controller_name' => 'MARTINController',
        ]);
    }
}
