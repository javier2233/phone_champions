<?php


namespace App\FrontEndBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function index()
    {
        $data = $this->get('twig')->render(
            'bundles/FrontEndBundle/home/home.html.twig'
        );
        return new Response($data);

    }

}