<?php


namespace App\PhoneChampionBundle\Controller;


use App\PhoneChampions\Shared\Infrastructure\FonoApi\FonoApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CompararController extends AbstractController
{
    public function index(FonoApi $fonoApi)
    {
        $test = $fonoApi->test();
        $data = $this->get('twig')->render(
            'bundles/PhoneChampionBundle/compara/comparar.html.twig',["test" => $test]
        );
        return new Response($data);

    }

}