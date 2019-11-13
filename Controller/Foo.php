<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/12/19
 * Time: 5:30 PM
 */

namespace Controller;


class Foo extends Controller
{

    /**
     * Foo constructor.
     */
    public function __construct()
    {
    }

    public function run(array $args)
    {
        echo  'We are in Foo controller';
    }
}