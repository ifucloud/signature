<?php
/**
 * Created by IntelliJ IDEA.
 * User: zfm
 * Date: 2019/6/11
 * Time: 下午4:51
 */

if (! function_exists('ifu_sign')) {
    /**
     * ahaschool mkt params sign
     * @param $params
     * @param null $secret
     * @param null $timestamp
     * @return string
     */
    function ifu_sign($params, $secret = null, $timestamp = null)
    {
        ksort($params);
        $string = '';
        if (!empty($params)) {
            $string = json_encode($params, JSON_UNESCAPED_SLASHES + JSON_UNESCAPED_UNICODE);
        }
        return md5($secret . ifu_remove_emoji($string) . $timestamp);
    }
}


if (! function_exists('ifu_remove_emoji')) {
    /**
     * ahaschool remove emoji
     * @param $string
     * @return string|string[]|null
     */
    function ifu_remove_emoji($string)
    {
        return preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $string);
    }
}
