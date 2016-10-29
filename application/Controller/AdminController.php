<?php

namespace Controller;
use System\BaseController;

/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 16:20
 */
class AdminController extends BaseController
{
    protected $pageName = 'Admin';
    public function __construct() {

    }
    public function blaz() {
        return 'va';
    }
}