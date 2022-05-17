<?php

include "Employee.php";

include './vendor/autoload.php';

use Symfony\Component\Validator\ValidatorBuilder;

function validateEmployee(Employee $employee) {
    $validator = (new ValidatorBuilder())->addMethodMapping('loadValidatorMetadata')->getValidator();

    $errors = $validator->validate($employee);

    if(count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error."<br><br>";
        }
    }
}

$employees[] = new Employee(12345, "name", 12000, new DateTime('2002-03-14 12:00:00'));
$employees[] = new Employee(12345, "", 1200, new DateTime('2002-03-14 12:00:00'));
$employees[] = new Employee(12345, "name2", 12000, new DateTime('2002-03-14 12:00:00'));
$employees[] = new Employee(1234, "name", 12000, new DateTime('2003-05-15 12:00:00'));
$employees[] = new Employee(12345, "name", 12000, new DateTime('2002-03 12:00:00'));

foreach ($employees as $employee) {
    validateEmployee($employee);
}

$employeDemo = new Employee(12345, "demo", 50000, new DateTime('2005-03-15 12:00:00'));
echo $employeDemo->getWorkExp();
