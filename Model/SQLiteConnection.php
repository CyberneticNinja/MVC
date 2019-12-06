<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/13/19
 * Time: 4:51 PM
 */

namespace Model;
use PDO;
use PDOException;

class SQLiteConnection
{
    protected  $db = NULL;

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    function __construct() {
        try {
//            $this->setDb(new PDO("sqlite:/var/www/html/MVC/Company"));

            $db = new PDO("sqlite:/var/www/html/MVC/Company");
            $this->setDb($db);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}