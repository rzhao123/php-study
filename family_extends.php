<?php
class Person {
    public $name = 'Robin';
    public $gender;
    public static $money = 10000;

    public function __construct()
    {
        echo '这里是父类' . PHP_EOL;
    }

    public function say()
    {
        echo $this->name . ' is ' . $this->gender . PHP_EOL;
    }
}

class Family extends Person {
    public $name;
    public $gender;
    public $age;
    public static $money = 100000;

    public function __construct()
    {
        parent::__construct();
        echo '这里是子类' . PHP_EOL;
    }

    public function say()
    {
        parent::say();
        echo $this->name . ' is ' . $this->gender . ' and she is ' . $this->age . PHP_EOL;
    }

    public function cry()
    {
        echo parent::$money . PHP_EOL;
        echo '--------------' . PHP_EOL;
        echo self::$money . PHP_EOL;
        echo '(*^_^*)' . PHP_EOL;
    }
}

$poor = new Family();

$poor->name = 'Lee';
$poor->gender = 'female';
$poor->age = 25;
$poor->say();
$poor->cry();
