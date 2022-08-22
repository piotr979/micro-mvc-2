<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Services\Router;
use App\Views\ViewRenderer;
use App\App;
use App\Services\FlashMessenger;

abstract class AbstractController {
   
    protected $twig;
    protected $conn;
    protected FlashMessenger $flashMessenger;
    
   // protected $conn;
    public ViewRenderer $viewRenderer;

    function __construct()
    {
      //  $this->conn = App::$app->conn;

        $this->viewRenderer = new ViewRenderer();
        $this->flashMessenger = new FlashMessenger();

        $this->conn = App::$app->conn;
        
    

        /**
         * configure Twig
         */
        $loader = new \Twig\Loader\FilesystemLoader( ROOT_DIR . '/templates');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => ROOT_DIR . '/temp',
            'auto_reload' => true
        ]);
    }
    abstract function attachRoutes(Router $router);
}
