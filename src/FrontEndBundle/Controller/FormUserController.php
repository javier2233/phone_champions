<?php


namespace App\FrontEndBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FormUserController extends AbstractController
{
    public function formCreateActor(){
        return new Response(
            '<html><body>Lucky number: </body></html>'
        );
    }
}