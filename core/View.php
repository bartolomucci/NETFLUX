<?php

namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    private $template;

    private $layout;

    private $data = array();

    public function __construct($template, $data = [], $layout = 'base.html.php')
    {
        $this->template = $template;
        $this->layout = $layout;
        $this->data = $data;
    }

    /** @deprecated version */
    public function render_old()
    {
        extract($this->data);
        ob_start();
        require '../template/' . $this->template;
        $content = ob_get_clean();
        require '../template/' . $this->layout;
    }

    public function render()
    {
        $loader = new FilesystemLoader('../template');
        $twig = new Environment($loader, [
            'cache' => false,
            'debug' => true,
        ]);
        echo $twig->render($this->template, $this->data);
    }
}
