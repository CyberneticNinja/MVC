<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/12/19
 * Time: 5:35 PM
 */

namespace Test;
use PHPUnit\Framework\TestCase;
use Controller\Foo;

class ControllerTest extends TestCase
{
     public function testController()
     {
         $f = new Foo();
         self::assertFalse($f->run([]),"Will add templating info later");
         self::assertTrue($f->run([]),"We are in Foo controller");
     }
}