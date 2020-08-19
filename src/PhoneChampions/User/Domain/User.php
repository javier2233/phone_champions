<?php


namespace App\PhoneChampions\User\Domain;


final class User
{
    private $userId;
    private $userEmail;
    private $userPassword;


    private function __construct(UserId $userId, UserEmail $userEmail, UserPassword $userPassword)
    {
        $this->userId = $userId;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public static function create(UserId $userId, UserEmail $userEmail, UserPassword $userPassword){
        return new self( $userId,  $userEmail,  $userPassword);
    }
}