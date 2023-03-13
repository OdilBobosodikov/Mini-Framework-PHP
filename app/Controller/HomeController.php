<?php

namespace Miniframework\Controller;

class HomeController
{

    public function index($responce)
    {
        return $responce->withJson(['test' => 'qwe']);
    }
}