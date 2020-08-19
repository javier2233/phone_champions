<?php


namespace App\PhoneChampions\User\Domain;



use App\PhoneChampions\User\Exception\InvalidMailException;

final class UserEmail
{
    private $email;
    public function __construct(string $email)
    {
        $this->email = $this->validateEmail($email);
    }

    public static function create(string $email){
        return new self($email);
    }

    private function validateEmail($email)
    {
        if($email === '') throw InvalidMailException::empty();
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw InvalidMailException::correctMail($email);
        }
        return $email;
    }

}