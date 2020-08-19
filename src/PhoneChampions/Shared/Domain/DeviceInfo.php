<?php


namespace App\PhoneChampions\Shared\Domain;


interface DeviceInfo
{
    public static function getInfoDevice(String $deviceName, String $brand): array;
    public static function getLastDevices(String $brand): array;


}