<?php
class Length {
    public function __call($name, $arguments)
    {
        return $name(implode(',', $arguments));
    }
}
$str = new Length();
echo call_user_func([$str, 'strlen'], ' this is a test ') . PHP_EOL;

$len = call_user_func([$str, 'strlen'], call_user_func([$str, 'trim'], ' this is a test '));
echo $len . PHP_EOL;
