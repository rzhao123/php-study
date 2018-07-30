<?php
interface Employee {
    public function working();
}

class Teacher implements Employee {
    public function working()
    {
        echo '教书' . PHP_EOL;
    }
}

class Coder implements Employee {
    public function working()
    {
        echo '写代码' . PHP_EOL;
    }
}

class Run {
    public $employee;

    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    public function working()
    {
        $this->employee->working();
    }
}

$teacher = new Run(new Teacher());
$teacher->working();

$coder = new Run(new Coder());
$coder->working();
