<?php
namespace Len\SmsExtend\Gateways;

use Len\SmsExtend\Contracts\GatewayInterface;
use Len\SmsExtend\Traits\HasHttpRequest;

/**
 * 网关抽象类
 *
 * @authors chenfeng (wangchenfeng@xdqcjy.com)
 * @date    2018-06-20 13:45:03
 * @version V1
 */
abstract class Gateway implements GatewayInterface
{
    use HasHttpRequest;

    /**
     * 网关配置
     *
     * @var array
     */
    protected $gatewayConfig;

    /**
     * 设置网关配置
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-21
     * @param array $config 配置
     */
    public function setGatewayConfig(array $config)
    {
        $this->gatewayConfig = $config;
    }

    /**
     * 获取网关配置
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @return array
     */
    public function getGatewayConfig()
    {
        return $this->gatewayConfig;
    }

    /**
     * 返回消息
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-21
     * @param int $code 状态码
     * @param string $message 消息
     * @param array $data 返回数据
     * @return array
     */
    public function responseData(int $code, string $message, array $data = [])
    {
        return [
            'code'    => $code,
            'message' => $message,
            'data'    => $data,
        ];
    }
}
