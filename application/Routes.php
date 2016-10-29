<?php
/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 16:14
 */

use Controller\MainController;
use View\View;

Router::route("/", function() {

    $ctrl = new MainController();
    return new View('pages\index.php',$ctrl);
});