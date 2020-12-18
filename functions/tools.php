<?php

/**
 * CMF密码加密方法
 * @param string $password 要加密的字符串
 * @param string $key 加密秘钥
 * @return string
 */
if (!function_exists('_generate_password')) {
    function _generate_password($password = '', $key = '')
    {
        return "###" . md5(md5($password . $key));
    }
}

/**
 * CMF密码比较方法,所有涉及密码比较的地方都用这个方法
 * @param string $password 要比较的密码
 * @param string $passwordInDb 数据库保存的已经加密过的密码
 * @param string $key 加密秘钥
 * @return boolean 密码相同，返回true
 */
if (!function_exists('_validate_password')) {
    function _validate_password($password = '', $passwordInDb = '', $key = '')
    {
        return _generate_password($password, $key) == $passwordInDb;
    }
}

/**
 * @Desc 产生随机字串
 * @param int $len 长度
 * @param string $type 字串类型  0字母 1数字 2大写字母 3小写字母
 * @param string $addChars 额外字符
 * @return false|string
 * @author yashuai
 */
if (!function_exists('_randString')) {
    function _randString($len = 6, $type = '', $addChars = '')
    {
        switch ($type) {
            case 0:
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
                break;
            case 1:
                $chars = str_repeat('0123456789', 3);
                break;
            case 2:
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars;
                break;
            case 3:
                $chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars;
                break;
            default:
                $chars = 'ABCDEFGHIJKMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789' . $addChars;
                break;
        }
        if ($len > 10) { //位数过长重复字符串一定次数
            $chars = $type == 1 ? str_repeat($chars, $len) : str_repeat($chars, 5);
        }
        $chars = str_shuffle($chars);
        return substr($chars, 0, $len);
    }
}
