<?php

include 'Employee.php';
include 'Department.php';

include "./vendor/autoload.php";

$employee1 = new Employee(12345, "name", 12000, new DateTime('2002-03-14 12:00:00'));
$employee2 = new Employee(12345, "name", 120000, new DateTime('2002-03-14 12:00:00'));
$employee3 = new Employee(12345, "name", 43567, new DateTime('2002-03-14 12:00:00'));
$employee4 = new Employee(12345, "name", 12000, new DateTime('2003-05-15 12:00:00'));
$employee5 = new Employee(12345, "name", 12000, new DateTime('2002-03-14 12:00:00'));

$department1 = new Department("Cool", array($employee1, $employee2, $employee4));

$department2 = new Department("Not Cool", array($employee2,$employee3,$employee4));

$department3 = new Department("Average", array($employee1,$employee3));

$department4 = new Department("extra cool", array($employee2,$employee4));

$departments = [];
array_push($departments, $department1, $department2, $department3, $department4);

$max_salary = -1;
$max_employee_count_max = 0;
$min_salary = PHP_INT_MAX;
$max_employee_count_min = 0;

foreach ($departments as $department)
{
    if ($department->getTotalSalary() > $max_salary)
    {
        $max_salary = $department->getTotalSalary();
        $max_employee_count_max = count($department->employees_array);
    }

    else if ($department->getTotalSalary() == $max_salary)
    {
        if (count($department->employees) > $max_employee_count_max)
            $max_employee_count_max = count($department->employees_array);
    }

    if ($department->getTotalSalary() < $min_salary)
    {
        $min_salary = $department->getTotalSalary();
        $max_employee_count_min = count($department->employees_array);
    }

    else if ($department->getTotalSalary() == $min_salary)
    {
        if (count($department->employees) > $max_employee_count_min)
            $max_employee_count_min = count($department->employees_array);
    }
}

echo "Департаменты с максимальной суммарной зарплатой: <br>";

foreach ($departments as $department)
{
    if ($department->getTotalSalary() == $max_salary & count($department->employees) == $max_employee_count_max)
    {
        echo $department->name."<br>";
    }

}
echo "Департаменты с минимальной суммарной зарплатой: <br>";

foreach ($departments as $department){
    if ($department->getTotalSalary() == $min_salary & $department->getTotalSalary() == $min_salary)
    {
        echo $department->name."<br>";
    }
}
