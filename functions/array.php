<?php

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
