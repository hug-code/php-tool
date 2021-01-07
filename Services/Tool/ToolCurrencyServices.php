<?php
/**
 * @name: 基础通用工具
 * @Created by PhpStorm
 * @author: yashuai
 * @file: ImgOperatingServices.php
 */

namespace HugCode\PhpTool\Services\Tool;

use HugCode\PhpTool\Services\BaseServices;

class ToolCurrencyServices extends BaseServices
{

    /**
     * CMF密码加密方法
     * @param string $password 要加密的字符串
     * @param string $key 加密秘钥
     * @return string
     */
    function generatePassword($password = '', $key = '')
    {
        return "###" . md5(md5($password . $key));
    }

    /**
     * CMF密码比较方法,所有涉及密码比较的地方都用这个方法
     * @param string $password 要比较的密码
     * @param string $passwordInDb 数据库保存的已经加密过的密码
     * @param string $key 加密秘钥
     * @return boolean 密码相同，返回true
     */
    function validatePassword($password = '', $passwordInDb = '', $key = '')
    {
        return $this->generatePassword($password, $key) == $passwordInDb;
    }


}
