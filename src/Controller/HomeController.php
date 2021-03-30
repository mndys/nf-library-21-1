<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController  extends AbstractController
{
    public static function show()
    {
        return file_get_contents(__DIR__ . '/../../templates/index.html');
    }
}
