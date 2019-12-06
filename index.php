<?php
    use Router\Router;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/11/19
 * Time: 1:35 PM
 */
    define('PAGE_START','MVC');

    require 'vendor/autoload.php';

    $router = new Router();
    $router->get('^(\/MVC\/Foo)$','Foo');
    $router->get('^(\/MVC\/)$','Foo');
    $router->get('^(\/MVC\/Employee)$','Employee');
    $router->get('^(\/MVC\/Employee\/create)$','Employee');
    $router->post('^(\/MVC\/Employee)$','Employee');
    $router->delete('^(\/MVC\/Employee)$','Employee');
    $router->put('^\/MVC\/Employee$','Employee');
    $router->get('^\/MVC\/Employee\/somerandomething\/[0-9]+\/anotherthing\/[0-9]+$','Employee');

//    $router->get('/foo','Foo');
//    $router->get('/bar','Bar');
//    $router->get('/foobar','Foobar');

    $router->run();