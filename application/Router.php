<?php
use Model\AppException;

/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 16:15
 */
class Router
{
    private $routes = [];
    private static $instance = null;

    /**
     * @param $path - The path of the route
     * @param $function - The function that returns a new view
     * @throws AppException
     */
    public static function route($path,$function) {
        if (self::$instance == null)
            self::$instance = new Router();

        if (in_array($path,self::$instance->routes))
            throw new AppException("Duplicate routers found for path: " . $path);

        self::$instance->routes[$path] = $function;
    }

    public function start()
    {
        // get current URL route and search for it, if found use it
        if (!array_key_exists($_SERVER['REQUEST_URI'],$this->routes))
            throw new AppException("Request URI does not have a route: " . $_SERVER['REQUEST_URI']);

        $routeCallback = $this->routes[$_SERVER['REQUEST_URI']];

        $view = call_user_func($routeCallback);


    }

    public static function getInstance() { return self::$instance; }

}