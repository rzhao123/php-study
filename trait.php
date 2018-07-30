<?php
/**
 *
 */
trait Hello
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}

/**
 *
 */
trait World
{
    public function sayWorld()
    {
        echo ' World';
    }
}

/**
 *
 */
class MyHelloWorld
{
    use Hello, World;

    public function sayMark()
    {
        echo '!' . PHP_EOL;
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayMark();
