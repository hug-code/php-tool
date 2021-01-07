<?php
/**
 * @name: 图片文件操作
 * @Created by PhpStorm
 * @author: yashuai
 * @file: ImgOperatingServices.php
 */

namespace HugCode\PhpTool\Services\File;

use HugCode\PhpTool\Services\BaseServices;

class ImgOperatingServices extends BaseServices
{

    /**
     * @Desc 图片url转base64
     * @param string $url
     * @return string
     * @throws \Exception
     * @author yashuai
     */
    public function imgUrlToBase64($url = '')
    {
        try {
            $imageInfo = getimagesize($url);
            $mime      = _array_field($imageInfo, 'mime', 'jpg');
            return 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($url));
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @Desc base64保存图片
     * @param $base64
     * @param string $rootPath
     * @param string $fileDir
     * @param bool $fileName
     * @return bool|string
     * @author yashuai
     */
    public function base64ToImg($base64, $rootPath='/', $fileDir='/', $fileName=false)
    {
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)) {
            _mkdir($rootPath . $fileDir);
            $fileName    = $fileName ? $fileName : _rand_string(32) . '.' . $result[2];
            $filePath    = $fileDir . $fileName;
            $fileContent = base64_decode(str_replace($result[1], '', $base64));
            if (file_put_contents($rootPath . $filePath, $fileContent)) {
                return $filePath;
            }
            return false;
        }
        return false;
    }

}
