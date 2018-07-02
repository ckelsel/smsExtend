<?php
namespace Len\SmsExtend;

use Config;

/**
 * 短信处理
 *
 * @authors chenfeng (wangchenfeng@xdqcjy.com)
 * @date    2018-06-20 14:17:32
 * @version V1
 */
class SmsExtend
{
    /**
     * 发送
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-21
     * @param string $mobilePhone [description]
     * @param string $message [description]
     * @return array
     */
    public function send(string $mobilePhone, string $message)
    {
        //获取默认网关名称
        $gatewayName = $this->getDefaultGatewayName();

        //创建网关对象
        $gateway = $this->createGateway($gatewayName);

        //获取网关配置
        $gatewayConfig = $this->getGatewayConfig($gatewayName);

        //设置网关配置
        $gateway->setGatewayConfig($gatewayConfig);

        //白名单检测
       /* if (!$this->whiteListCheck($mobilePhone)) {
            return $gateway->responseData(0, "sms send success");
        }*/

        return $gateway->send($mobilePhone, $message);
    }

    /**
     * create gateway
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @param string $name 名称
     * @return object
     */
    protected function createGateway($name)
    {
        $className = $this->formatGatewayClassName($name);
        return $this->makeGateway($className);
    }

    /**
     * make gateway
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @param string $gateway 网关名称
     * @return object
     */
    protected function makeGateway(string $gateway)
    {
        if (!class_exists($gateway)) {
            throw new \RuntimeException($gateway . ' Class Not Exists');
        }

        return new $gateway();
    }

    /**
     * Format gateway name
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @param  string $name 名称
     * @return string
     */
    protected function formatGatewayClassName($name)
    {
        if (class_exists($name)) {
            return $name;
        }
        $name = ucfirst(str_replace(['-', '_', ''], '', $name));
        return __NAMESPACE__ . "\\Gateways\\{$name}Gateway";
    }

    /**
     * 获取默认的网关
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-21
     * @return string
     */
    protected function getDefaultGatewayName()
    {
        $gatewayName = Config::get('sms.default_gateways');
        if (empty($gatewayName)) {
            throw new \RuntimeException(' Please configure the default gateway  in the sms.conf file');
        }

        return $gatewayName;
    }

    /**
     * 获取网关的配置
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-21
     * @param  string  $gatewayName 网关名称
     * @return array
     */
    protected function getGatewayConfig(string $gatewayName = '')
    {
        if (!empty($gatewayName)) {
            $config = Config::get('sms.gateways.' . $gatewayName);
        } else {
            $config = Config::get('sms.gateways.' . $this->getDefaultGatewayName());
        }

        if (empty($config)) {
            throw new \RuntimeException(' Please configure the gateway info  in the sms.conf file');
        }

        return $config;
    }

    /**
     * 白名单检测
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-21
     * @param string $mobilePhone 手机
     * @return boolean
     */
    protected function whiteListCheck(string $mobilePhone)
    {
        $whiteList = Config::get('sms.white_list');
        if (empty($whiteList) || !is_array($whiteList)) {
            return true;
        }

        //如果在测试环境同时没有加入白名单则无法发送短信
        if (env('APP_ENV') == 'local' && !in_array($mobilePhone, $whiteList)) {
            return false;
        }

        return true;
    }
}
