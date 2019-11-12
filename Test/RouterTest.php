<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/12/19
 * Time: 4:06 PM
 */

namespace Test;

use Router\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testRouteList()
    {
        $router = new Router();
        $router->get('/', 'defaultcontroller');
        $router->get('/foo', 'foocontroller');
        $router->put('/bar', 'barController');
        $router->post('/foobar', 'foobarcontroller');
        $router->delete('/someroute', 'somecontroller');

        $routeList = array(
            0 => array(0 => "GET", 1 => "/", 2 => "defaultcontroller"),
            1 => array(0 => "GET", 1 => "/foo", 2 => "foocontroller"),
            2 => array(0 => "PUT", 1 => "/bar", 2 => 'barController'),
            3 => array(0 => "POST", 1 => "/foobar", 2 => 'foobarcontroller'),
            4 => array(0 => "DELETE", 1 => "/someroute", 2 => 'somecontroller')
        );

        $incorrectRouteList = array(
            0 => array(0 => "GET", 1 => "/", 2 => "defaultcontroller"),
            1 => array(0 => "GET", 1 => "/foo", 2 => "foocontroller"),
            2 => array(0 => "PUT", 1 => "/bar", 2 => 'barController'),
            3 => array(0 => "POST", 1 => "/foobar", 2 => 'foobarcontroller'),
            4 => array(0 => "DELETE", 1 => "/someroute", 2 => 'somecontrollerX')
        );

       self::assertEquals($routeList,$router->getRouteList());
       self::assertNotEquals($incorrectRouteList,$router->getRouteList());
    }


}