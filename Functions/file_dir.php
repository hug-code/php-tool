<?php
/**
 * @Desc 创建目录
 * @param $path
 * @author yashuai
 * @Time 2020/11/23 14:04
 */
if (!function_exists('_mkdir')) {
    function _mkdir($path){
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
            @chmod($path, 0777);
        }
    }
}

/**
 * @Desc 删除文件
 * @param $filename
 * @author yashuai
 * @Time 2020/11/23 14:04
 */
if (!function_exists('_delete_file')) {
    function _delete_file($filename){
        if (file_exists($filename)) {
            unlink($filename);
        }
    }
}
