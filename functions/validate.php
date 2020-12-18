<?php
/**
 * @Desc 验证手机号
 * @param int $mobile
 * @return false|int
 * @author yashuai
 * @Time 2020/11/26 16:12
 */
if (!function_exists('_verify_mobile')) {
    function _verify_mobile($mobile)
    {
        return preg_match("/^1\d{10}$/", $mobile);
    }
}
/**
 * @Desc 验证邮箱
 * @param string $email
 * @return false|int
 * @author yashuai
 * @Time 2020/11/26 16:12
 */
if (!function_exists('_verify_email')) {
    function _verify_email(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
/**
 * @Desc 验证为手机号或者邮箱
 * @param string $string
 * @return false|int
 * @author yashuai
 * @Time 2020/11/26 16:12
 */
if (!function_exists('_verify_mobile_or_email')) {
    function _verify_mobile_or_email($string)
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL) || _verify_mobile($string);
    }
}


