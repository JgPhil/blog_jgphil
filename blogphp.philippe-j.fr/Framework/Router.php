<?php

namespace App\Framework;

use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use App\src\controller\AccountController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $accountController;
    private $request;
    protected $routes = [];
    protected $param;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->request = new Request;
        $this->frontController = new FrontController;
        $this->backController = new BackController;
        $this->accountController = new AccountController;
        $this->errorController = new ErrorController;
    }


    /**
     * @return void
     */
    public function run()
    {
        $xml = new \DOMDocument;
        $xml->load('../config/routes.xml');
        $routes = $xml->getElementsByTagName('route');
        $route = htmlentities($this->request->getGet()->getParameter('route'));
        $action = null;

        try {

            if (empty($route)) {
                return $this->frontController->home();
            }
            foreach ($routes as $xmlRoute) {
                $param = $xmlRoute->getAttribute('param');
                $controller = substr($xmlRoute->getAttribute('application'), 0, -3) . 'Controller';
                $method = $xmlRoute->getAttribute('method') . '(' . $param . ')';
                $action = '$this->' . $controller . '->' . $method . ';';
                if ($xmlRoute->getAttribute('url') == $route) {
                    return eval($action);
                }
            }
            if (null === $action) {
                return $this->errorController->errorNotFound();
            }
            return $action;
        } catch (Exception $e) {
            $this->errorController->errorServer();
        }
    }
}


/*
                        
                        $controllers = array('frontController', 'backController', 'errorController');
                        $key = array_search($routeController, $controllers);
                        $matchedController = $controllers[$key];
                        $matchedControllerClass = "App\src\controller\\".ucfirst($matchedController);
                        $this->matchedController = new $matchedControllerClass;
                        
                        
                        */
