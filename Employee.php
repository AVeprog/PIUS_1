<?php

include './vendor/autoload.php';

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Employee{
    public int $id;
    public string $name;
    public int $salary;
    public DateTime $dateWork;

    /**
     * @param $id - id сотрудника
     * @param $name - имя сотрудника
     * @param $salary - размер зарплаты
     */

    public function __construct(int $id, string $name, int $salary, DateTime $dateWork){
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->dateWork = $dateWork;
    }

    /*
    * Конструктор класса
    */

    public static function loadValidatorMetadata (ClassMetadata $metadata){
        $metadata->addPropertyConstraints("id", [
            new Assert\Length(['min'=>5, 'max' => 10]),
            new Assert\Positive(), new Assert\NotBlank()]);

        $metadata->addPropertyConstraints("name", [
            new Assert\Length(['min'=>2]),
            new Assert\Regex([
                'pattern' => '/\n/',
                'match' => false,
                'message' => 'No number in name']),
            new Assert\NotBlank()
        ]);

        $metadata->addPropertyConstraints("salary", [
            new Assert\Length(['min'=>5]),
            new Assert\Positive,
            new Assert\NotBlank()
        ]);

        $metadata->addPropertyConstraints("dateWork", [new Assert\DateTime(), new Assert\NotBlank()]);
    }


    public function getWorkExp():string {
        return date_diff(new DateTime(), $this->dateWork)->format('%a');
    }

    /*
    *Метод, возвращающий текущий опыт сотрудника (количество полных лет)
    * @return DateTime
    */

}
