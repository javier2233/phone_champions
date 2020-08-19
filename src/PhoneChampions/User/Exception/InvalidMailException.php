<?php


namespace App\PhoneChampions\User\Exception;


use App\PhoneChampions\Share\Exception\InvalidArgumentException;

class InvalidMailException extends InvalidArgumentException
{

    public static function correctMail(string $email):self
    {
        $exception = new static("El correo  [$email] no es correcto");
        return $exception;
    }

    public static function empty()
    {
        return new static("El correo no puede ser vacío");
    }

}