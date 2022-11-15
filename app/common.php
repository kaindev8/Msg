<?php
// 应用公共文件
function delFiles($dir): void
{
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (is_dir($fullpath)) {
                delFiles($fullpath);
            } else {
                unlink($fullpath);
            }
        }
    }
    closedir($dh);
}