<?php

namespace App\services;

class TwigRendererServices implements IRenderer
{
    /**
     * @var \Twig\Environment
     */
    public $twig;

    public function render($template, $params = [])
    {
        // var_dump($this->twig);
        $template = $template . '.twig';
        return $this->twig->render($template, $params);
    }
}