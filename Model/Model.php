<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/12/19
 * Time: 3:12 PM
 */

namespace Model;


class Model
{
    //oracle,sqlite, mysql etc
    protected $sqlDB = NULL;


    public function getSqlDB()
    {
        return $this->sqlDB;
    }

    public function setSqlDB($sqlDB)
    {
        $this->sqlDB = $sqlDB;
    }


    /**
     * Model constructor.
     */
    public function __construct($dbName)
    {
        switch ($dbName)
        {
            case "sqlite":
                $pdo = new SQLiteConnection();
                $this->setSqlDB($pdo->getDb());
        }
    }


}