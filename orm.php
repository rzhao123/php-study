<?php
abstract class ActiveRecord {
    protected static $table;
    protected $filedValues;
    public $select;

    public static function findById($id)
    {
        $query = "select * from ".static::$table." where id = ".$id;
        return self::createDomain($query);
    }

    public static function __callStatic($method, $args)
    {
        $field = preg_replace('/^findBy(\w*)$/', '${1}', $method);
        $query = "select * from ".static::$table." where ".$field." = '".$args[0]."'";
        return self::createDomain($query);
    }

    private static function createDomain($query) {
        $klass = get_called_class();
        $domain = new $klass();
        $domain->select = $query;
        foreach ($klass::$fields as $filed => $type) {
            $domain->$filed = 'TODO:set from sql result';
        }
        return $domain;
    }
}

class Customer extends ActiveRecord {
    protected static $table = 'custdb';
    protected static $fields = [
        'id' => 'int',
        'email' => 'varchar',
        'lastname' => 'varchar'
    ];
}


class Sales extends ActiveRecord {
    protected static $table = 'saledb';
    protected static $fields = [
        'id' => 'int',
        'item' => 'varchar',
        'qty' => 'int'
    ];
}

// echo Customer::findById(123)->select. PHP_EOL;

echo Customer::findById(123)->email. PHP_EOL;

// echo Sales::findById(321)->select. PHP_EOL;
//
// echo Customer::findByLastname('Denoncourt')->select. PHP_EOL;
