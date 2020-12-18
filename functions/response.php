<?php

/**
 * @Description:  抛出异常
 * @Author: yashuai
 * @param string $code 状态码
 * @param string $msg 提示信息
 */
if (!function_exists('_throw')) {
    function _throw($code = 500, $msg = '')
    {
        throw new \Exception($msg, $code);
    }
}

/**
 * @Description:  成功返回
 * @Author: yashuai
 * @param string $data 返回数据
 * @param string $msg 提示信息
 */
if (!function_exists('_success')) {
    function _success($data = [], $msg = 'success')
    {
        echo json_encode(['code' => 0, 'msg' => $msg, 'data' => $data]);
        exit;
    }
}

/**
 * @Description: 失败返回
 * @Author: yashuai
 * @param string $msg 提示信息
 * @param int $code 状态码
 * @param string $data 返回数据
 */
if (!function_exists('_fail')) {
    function _fail($code = 500, $msg = 'fail', $data = [])
    {
        echo json_encode(['code' => $code, 'msg' => $msg, 'data' => $data]);
        exit;
    }
}

