<?php


namespace App\PhoneChampions\User\Domain;


use App\PhoneChampions\User\Exception\InvalidPasswordException;

final class UserPassword
{
    private $password;

    public function __construct($password)
    {
        $this->password = $this->validatePassword($password);

    }

    public static function create($password)
    {
        return new self($password);
    }

    private function validatePassword($password)
    {
        if($password === '') throw InvalidPasswordException::empty();
        if(strlen($password) > 3 && strlen($password) < 28 ){
            if (preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password))
            {
                $password = $this->encryptPassword($password);
                return $password;
            }
        }
        throw  InvalidPasswordException::correctPassword();
    }

    private function encryptPassword($password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }
}