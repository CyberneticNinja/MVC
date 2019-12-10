<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/18/19
 * Time: 4:58 PM
 */

namespace Controller;


class Employee extends Controller
{
    /**
     * Employee constructor.
     */
    public function __construct()
    {
    }

    public function run(array $args)
    {
        echo  'We are in Employee controller';
        echo  '<br/>';
    }
}