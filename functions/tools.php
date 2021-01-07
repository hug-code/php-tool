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

/**
 * @Desc 计算两个日期相差时间
 * @param string $startTime
 * @param string $endTime
 * @param int $type 0:天数  1:小时数  2:分钟数 3:秒数 4:秒数
 * @author yashuai
 * @Time 2020/12/7 14:33
 */
if (!function_exists('_diff_between_days')) {
    function _diff_between_days($start, $end, $type = 0)
    {
        $interval = [86400, 3600, 60, 0];
        $type     = $interval[$type] ?? $interval[0];
        $res      = strtotime($end) - strtotime($start);
        return $type ? (int)$res / $type : $res;
    }
}

/**
 * @Desc  把返回的数据集转换成Tree
 * @author yashuai
 * @param array $list 原始数据
 * @param string $pk 主键
 * @param string $pid 父级ID
 * @param string $child 子级索引
 * @param int $root
 * @return array
 */
if (!function_exists('_listToTree')) {
    function _listToTree($list = [], $pk = 'id', $pid = 'pid', $child = '_child')
    {
        $tree = array();  //格式化好的树
        foreach ($list as $item) {
            if (isset($list[$item[$pid]])) {
                $list[$item[$pid]][$child][] = &$list[$item[$pk]];
            } else {
                $tree[] = &$list[$item[$pk]];
            }
        }
        return $tree;
    }
}

/**
 * @Desc  获取数组字段值
 * @author yashuai
 * @param array $array 数组
 * @param string $field 字段名称
 * @param bool|string|integer $default 默认值
 * @param bool|string|integer|array $exception 例外值
 * @return bool|mixed
 */
if (!function_exists('_array_field')) {
    function _array_field($array = [], $field = '', $default = false, $exception=true)
    {
        if(!isset($array[$field])){
            return $default;
        }
        $value = $array[$field];
        return empty($value)
            ? (empty($exception) ? ($value === $exception ? $value : $default) : $default)
            : $value;
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
if (!function_exists('_rand_string')) {
    function _rand_string($len = 6, $type = '', $addChars = '')
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
