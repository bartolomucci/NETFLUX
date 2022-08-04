<?php

namespace Core;

abstract class AbstractController
{
    public abstract function index();

    public function render($template, $data = [], $layout = 'base.html.php')
    {
        $view = new View($template, $data, $layout);
        $view->render();
    }
}