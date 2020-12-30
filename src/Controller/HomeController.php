<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * Undocumented function
     * 
     * @Route("/", name="home")
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'user' => $this->getUser()
        ]);
    }


    /**
     * Undocumented function
     *
     * @Route("/a-propos", name="about")
     * @return Response
     */
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'user' => $this->getUser()
        ]);
    }
}
