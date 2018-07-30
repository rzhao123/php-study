<?php
$mc = new Memcache();
$mc->connect('127.0.0.1', 11211);
$mc->set('test', 'this is a test', 0, 10);
$val = $mc->get('test');
echo $val . PHP_EOL;

$mc->delete('test');
$mc->flush();
$mc->close();
