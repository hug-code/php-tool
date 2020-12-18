<?php

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
