<?php

namespace View;
use System\BaseController;
use System\BaseView;

/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 16:22
 */
class View extends BaseView
{

    function __construct($viewPath,BaseController $controller)
    {
        $controller->render($viewPath);

    }
}