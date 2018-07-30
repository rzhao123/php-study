<?php
class Log {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function read()
    {
        $this->db->read();
    }

    public function update()
    {
        $this->db->update();
    }

    public function create()
    {
        $this->db->create();
    }

    public function delete()
    {
        $this->db->delete();
    }

}

class Mysql {

    public function read()
    {
        echo '查询' . PHP_EOL;
    }

    public function update()
    {
        echo '更新' . PHP_EOL;
    }

    public function create()
    {
        echo '创建' . PHP_EOL;
    }

    public function delete()
    {
        echo '删除' . PHP_EOL;
    }

}

$log = new Log(new Mysql());
$log->read();
$log->update();
$log->create();
$log->delete();
