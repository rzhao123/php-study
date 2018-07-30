<?php
class Account {
    public $username = 'robin';
    private $passwd = '1234qwer';

    public function __toString()
    {
        return "当前对象的用户名是 {$this->username}, 密码是 {$this->passwd}";
    }
}

$account = new Account();
echo $account . PHP_EOL;

print_r($account);
