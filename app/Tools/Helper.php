<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/5/30
 * Time: 15:48
 */
namespace App\Tools;
class Helper
{
    /**
     * 异位或加密字符串
     * @param $value        需要加密的字符串
     * @param int $type 加密解密：（0：加密，1：解密）
     * @return int|mixed    加密或可，哦精辟的字符串
     */
    public static function encryption($value, $type = 0)
    {
        $key = md5(config('blog.enctyption_key'));
        if (!$type) {
            return str_replace('=', '', base64_encode($value ^ $key));
        }
        $value = base64_decode($value);
        return $value ^ $key;
    }

    /**
     * 打印数组
     * @param $arr
     * @param string $method
     */
    public static function dump($arr, $method = 'var_dump')
    {
        echo '<pre>';
        $method($arr);
    }
}
