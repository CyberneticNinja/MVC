<?php
    use Router\Router;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/11/19
 * Time: 1:35 PM
 */

    require 'vendor/autoload.php';

    $router = new Router();
    $router->get('/foo','foo');
    $router->get('/bar','bar');
    $router->get('/foobar','foobar');

    $router->run();