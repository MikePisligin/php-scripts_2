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
        if ($template == 'users') {

          $users = $params["paginator"]->getItems();
          $url = $params["paginator"]->getUrls();            
        }

        $template = $template . '.twig';
        $content = $this->twig->render($template, [ 'users' => $users,
                                                    'url' => $url,
                                                    'user' => $params['user'],
                                                    'goods' => $params['goods'],
                                                    'good' => $params['good']
                                                  ]);
        return $this->twig->render('/layouts/main.twig', [ 'content' => $content ]);

    }
}