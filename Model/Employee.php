<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/15/19
 * Time: 1:07 PM
 */


namespace Model;



class Employee extends Model
{


    public function getAllEmployees()
    {
        $DBH = $this->getSqlDB();
        $STH = $DBH->prepare
        ('SELECT *
            FROM Employee');
        $STH->execute();

        return $STH->fetchAll();
    }

    public function findEmployeeByName($f_name,$l_name)
    {
        $DBH = $this->getSqlDB();
        $STH = $DBH->prepare
        ('SELECT *
            FROM Employee
            WHERE Employee.f_name LIKE ? and Employee.l_name LIKE ?');
        $STH->execute([$f_name,$l_name]);

        return $STH->fetchAll();
    }
    public function findEmployeeById($id)
    {
        $DBH = $this->getSqlDB();
        $STH = $DBH->prepare
        ('SELECT *
            FROM Employee
            WHERE Employee.id LIKE ?');
        $STH->execute([$id]);

        return $STH->fetchAll();
    }

    public function findEmployeeByDepartment($department)
    {
        $DBH = $this->getSqlDB();
        $STH = $DBH->prepare
        ('SELECT *
            FROM Employee e
            JOIN Department d on d.id = e.department
            WHERE d.department_name LIKE ?');
        $STH->execute([$department]);

        return $STH->fetchAll();
    }
}