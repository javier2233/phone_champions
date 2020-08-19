<?php


namespace App\PhoneChampionBundle;


use App\PhoneChampionBundle\DependencyInjection\PhoneChampionsExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PhoneChampionBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new PhoneChampionsExtension();
    }
}