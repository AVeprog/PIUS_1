<?php

include './vendor/autoload.php';

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Department {
    public $employees_array;
    public string $name;

    /**
     * @param $employees_array - массив объектов класса Employee
     * @param $name - название
     */

    public function __constructor(string $name, $employees_array){
        $this->name = $name;
        $this->employees_array = $employees_array;
    }

    /*
    * Конструктор класса
    */

    public function getTotalSalary(){
        $totalsalary = 0;
        foreach ($this->employees_array as &$employee)
        {
            $totalsalary+=$employee->salary;
        }
        return $totalsalary;
    }

    /*
    *Метод, возвращающий суммарный размер зарплаты сотрудников
    * @return totalsalary (int)
    */
}
