<?php


namespace App\PhoneChampions\User\Exception;


use App\PhoneChampions\Share\Exception\InvalidArgumentException;

class InvalidPasswordException extends InvalidArgumentException
{
    public static function correctPassword():self
    {
        $exception = new static("La contraseña no cumple con los requerimientos");
        return $exception;
    }

    public static function empty()
    {
        return new static("La Contraseña no puede ser vacío");
    }

}