<?php
use Model\AppException;

/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 15:50
 */
class Bootstrap
{
    /**
     * @var Router
     */
    private static $router;

    public static function init($conf)
    {
        self::initAutoloader();
        self::initRouter();
    }

    private static function initAutoloader()
    {
        spl_autoload_register(function ($class) {
            $parts = explode("\\",$class);

            if (count($parts) < 2)
                throw new AppException("Namespace not found in class: " . $class);

            $namespace = $parts[0];
            $className = $parts[1];
            $fullPath = __DIR__ . DIRECTORY_SEPARATOR . $namespace . DIRECTORY_SEPARATOR . $className . ".php";

            if (!file_exists($fullPath))
                throw new AppException("Could not find path to load: " . $fullPath);

            include_once($fullPath);
        });
    }

    public static function route()
    {
    }

    private static function initRouter()
    {
        require('../application/Router.php');
        require('../application/Routes.php');
        self::$router = Router::getInstance();
        self::$router->start();

    }
}