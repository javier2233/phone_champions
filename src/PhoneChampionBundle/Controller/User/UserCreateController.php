<?php


namespace App\PhoneChampionBundle\Controller\User;


use App\PhoneChampions\Share\Exception\InvalidArgumentException;
use App\PhoneChampions\User\Domain\UserEmail;
use App\PhoneChampions\User\Domain\UserPassword;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserCreateController extends AbstractController
{

    public function createUserAction(Request $request): JsonResponse
    {
        $jsonRequestBody = $request->request->all();
        $emailRequest = (isset($jsonRequestBody["email"])) ? $jsonRequestBody["email"] : "";
        $passwordRequest = (isset($jsonRequestBody["password"])) ? $jsonRequestBody["password"] : "";

        try {
            $email = UserEmail::create($emailRequest);

        } catch (InvalidArgumentException $e) {
            return new JsonResponse(['error' => $e->getMessage()], 400);
        }

        try {
            $password = UserPassword::create($passwordRequest);
        } catch (InvalidArgumentException $e) {
            return new JsonResponse(['error' => $e->getMessage()], 400);
        }

        return new JsonResponse(
            ['success' => 'Post correctly created', 'post' => $jsonRequestBody],
            200
        );
    }
}