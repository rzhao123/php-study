<?php
/**
 * 文件递归查询
 */
class Dir
{
    public function show($file = '')
    {
        $currentDir = empty($file) ? dirname(__FILE__) : $file;
        $dir = new DirectoryIterator($currentDir);
        foreach ($dir as $fileInfo) {
            if (!$fileInfo->isDir()) {
                echo $dir->getPath() . '/' . $fileInfo->getFilename() . " is " . $fileInfo->getSize() . ' bytes' . PHP_EOL;
            } else {
                if (!preg_match('/\./', $dir->current()->getFilename())) {
                    self::show($dir->current()->getPathname());
                }
            }
        }
    }
}

$dir = new Dir();
$dir->show();
