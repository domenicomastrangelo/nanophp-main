<?php

namespace App\Controllers;

class BaseController extends \NanoPHP\Controllers\BaseController
{
    protected $twig = null;

    public function __construct(\NanoPHP\DependencyInjector $di)
    {
        parent::__construct($di);

        if ($this->view !== null) {
            $twigLoader = new \Twig\Loader\FilesystemLoader(\App\Config::VIEWS_PATH);
            $this->twig = new \Twig\Environment($twigLoader, [
                'cache' => false // \App\Config::CACHE_PATH,
            ]);
        }
    }
}
