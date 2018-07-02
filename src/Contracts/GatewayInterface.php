<?php
namespace Len\SmsExtend\Contracts;

/**
 * 网关接口
 *
 * @authors chenfeng (wangchenfeng@xdqcjy.com)
 * @date    2018-06-20 10:26:40
 * @version V1
 */
interface GatewayInterface
{
    /**
     * 发送SMS
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @return array
     */
    public function send(string $mobilePhone, string $messages);
}
