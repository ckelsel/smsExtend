<?php
namespace Len\SmsExtend\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 定义错误消息组件名称
 *
 * @authors cheng (wangchenfeng@xdqcjy.com)
 * @date    2018-06-20 15:01:06
 */
class SmsExtend extends Facade
{
    /**
     * 获取组件的注册名称
     *
     * @authors cheng (wangchenfeng@xdqcjy.com)
     * @date    2018-03-20 15:01:06
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'smsExtend';
    }
}
