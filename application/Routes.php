<?php
/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 16:14
 */

use Controller\AdminController;
use Controller\MainController;
use View\View;

Router::route("/", function($params = []) {

    $ctrl = new MainController();
    return new View('pages\index.php',$ctrl);
});

Router::route("/admin", function() {

    $ctrl = new AdminController();
    return new View('pages\admin.php',$ctrl);
});