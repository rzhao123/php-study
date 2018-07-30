<?php
/**
 * 缓存管理
 */
interface Cache
{
    const MAXNUM = 10000;
    public function get($key);
    public function set($key, $value);
    public function flush();
}
