<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use NanoPHP\Library\Http\Response;

class Home extends BaseController
{
    public function homepage(Response $response)
    {
        $template = $this->twig->load($this->getView());
        $renderedView = $template->render();
        return $response->setStatus(200)
                        ->setBody($renderedView)
                        ->get();
    }
}
