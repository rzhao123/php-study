<?php
class Account {
    private $username = 'robin';

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        if (!isset($this->$name)) {
            echo '未设置';
            $this->$name = '正在为您设置';
        }
        return $this->$name;
    }

    public function __call($name, $arguments)
    {
        switch (count($arguments)) {
            case 2:
                echo $arguments[0] * $arguments[1] . PHP_EOL;
                break;

            case 3:
                echo array_sum($arguments) . PHP_EOL;
                break;

            default:
                echo '参数不对' . PHP_EOL;
                break;
        }
    }
}

$account = new Account();

echo $account->username.PHP_EOL;
echo $account->email.PHP_EOL;

$account->make(5);
$account->make(5, 6);
