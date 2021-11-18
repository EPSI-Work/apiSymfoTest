<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CapitalizeController
{
    /**
     * @Route("/api/capitalize/{text}", name="app_lucky_number")
     */
    public function number(string $text): Response
    {
        return new Response(
            $this->capitalize($text)
        );
    }

    public function capitalize(string $content){
        return strtoupper($content);
    }
}