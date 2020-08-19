<?php


namespace App\PhoneChampionBundle\Controller;


use App\PhoneChampions\Shared\Infrastructure\FonoApi\FonoApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function index()
    {
        $lastDevices = FonoApi::getLastDevices();
        $data = $this->get('twig')->render(
            'bundles/PhoneChampionBundle/home/home.html.twig',
            ["lastDevices" => $lastDevices]
        );
        return new Response($data);

    }

}