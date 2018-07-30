<?php
/**
* 创建类
*/
class Person {
    public $name;
    public $gender;
    public function say()
    {
        echo $this->name, ' is ', $this->gender. PHP_EOL;
    }
}

class Family {
    public $person;
    public $location;

    public function __construct($person, $location)
    {
        $this->person = $person;
        $this->location = $location;
    }
}

$student = new Person();
$robin = new Family($student, 'peking');
$robin->person->name = 'Robin';
$robin->person->gender = 'male';
$robin->person->say();

?>
