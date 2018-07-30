<?php
/**
 *
 */
class Person
{
    public $name;
    public $gender;

    public function say()
    {
        echo $this->name . " is " . $this->gender . PHP_EOL;
    }

    public function __set($name, $value) {
        echo "Setting ${name} to ${value}" . PHP_EOL;
        $this->$name = $value;
    }

    public function __get($name)
    {
        if (!isset($this->$name)) {
            echo '未设置';
            $this->$name = '正在为你设置默认值';
        }
        return $this->$name;
    }
}

$p = new Person();
$p->name = 'Robin';
$p->gender = 'male';
$p->age = 31;

$reflect = new ReflectionObject($p);

$props = $reflect->getProperties();
foreach ($props as $prop) {
    echo $prop->getName() . PHP_EOL;
}

$mths = $reflect->getMethods();
foreach ($mths as $mth) {
    echo $mth->getName() . PHP_EOL;
}

// 返回对象属性列表所属的类
$obj = get_class($p);
echo $obj . PHP_EOL;

// 返回对象属性的关联数组
var_dump(get_object_vars($p));

// 类属性
var_dump(get_class_vars($obj));

// 返回由类的方法名组成的数组
var_dump(get_class_methods($obj));
