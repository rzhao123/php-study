<?php
/**
* 轮询 hash 算法 
*/
class FlexiHash {
    private $serverList = [];
    private $isSorted = FALSE;

    // 增加
    public function addServer($server)
    {
        $hash = $this->mHash($server);
        if (!isset($this->serverList[$hash])) {
            $this->serverList[$hash] = $server;
        }
        $this->isSorted = FALSE;
        return TRUE;
    }

    // 移除
    public function removeServer($server)
    {
        $hash = $this->mHash($server);
        if (isset($this->serverList[$hash])) {
            unset($this->serverList[$hash]);
        }
        $this->isSorted = FALSE;
        return TRUE;
    }

    // 返回当前服务器
    public function lookup($key)
    {
        $hash = $this->mHash($key);
        echo $key . ':' . $hash . PHP_EOL;
        if (!$this->isSorted) {
            krsort($this->serverList, SORT_NUMERIC);
            $this->isSorted = TRUE;
            var_dump($this->serverList);
        }

        foreach ($this->serverList as $pos => $server) {
            if ($hash >= $pos) {
                return $server;
            }
        }

        return $this->serverList[count($this->serverList) - 1];
    }

    // 算法
    public function mHash($key)
    {
        $md5 = substr(md5($key), 0, 8);
        $seed = 31;
        $hash = 0;

        for ($i=0; $i < 8; $i++) {
            $hash = $hash *$seed + ord($md5{$i});
        }
        return $hash & 0x7FFFFFFF;
    }
}

$hserver = new FlexiHash();
$hserver->addServer('192.168.1.1');
$hserver->addServer('192.168.1.2');
$hserver->addServer('192.168.1.3');
$hserver->addServer('192.168.1.4');
$hserver->addServer('192.168.1.5');

echo "save key1 in server: " . $hserver->lookup('key1') . PHP_EOL;
echo "save key2 in server: " . $hserver->lookup('key2') . PHP_EOL;

echo '====================================================' . PHP_EOL;

$hserver->removeServer('192.168.1.5');

echo "save key1 in server: " . $hserver->lookup('key1') . PHP_EOL;
echo "save key2 in server: " . $hserver->lookup('key2') . PHP_EOL;

echo '====================================================' . PHP_EOL;


$hserver->addServer('192.168.1.6');

echo "save key1 in server: " . $hserver->lookup('key1') . PHP_EOL;
echo "save key2 in server: " . $hserver->lookup('key2') . PHP_EOL;
