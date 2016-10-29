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

//        $params = self::$instance->getPathParams($path);

        if (in_array($path,self::$instance->routes))
            throw new AppException("Duplicate routers found for path: " . $path);

        self::$instance->routes[$path] = $function;
    }

    public function start()
    {
        $rp = explode('?', $_SERVER["REQUEST_URI"], 2);
        $requestUri = $rp[0];
        if (count($rp) > 1)
            parse_str($rp[1],$requestParams);
        else
            $requestParams = [];

        // get current URL route and search for it, if found use it
        if (!array_key_exists($requestUri,$this->routes))
            throw new AppException("Request URI does not have a route: " . $requestUri);

        $routeCallback = $this->routes[$requestUri];

        $view = call_user_func_array($routeCallback,$requestParams);


    }

//    public function getPathParams($path) {
//        $params = explode('/',$path);
//        $ret = [];
//        foreach($params as $param) {
//            if (substr($param,0,1) == ":")
//            {
//                array_push($ret,substr($param,1,strlen($param)-1));
//            }
//        }
//        return $ret;
//    }

    public static function getInstance() { return self::$instance; }

}