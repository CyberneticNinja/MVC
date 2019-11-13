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
    $router->get('/','Foo');
    $router->get('/foo','Foo');
    $router->get('/bar','Bar');
    $router->get('/foobar','Foobar');

    $router->run();