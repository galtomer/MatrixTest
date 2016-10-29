<?php
namespace System;
use Model\AppException;


/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 15:49
 */
class BaseController
{

    public function render($viewPath)
    {
        $viewPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $viewPath;
        if (!file_exists($viewPath))
            throw new AppException("View file does not exist: " . $viewPath);

        require $viewPath;
    }
}