<h1 align="center">SMS EXTEND</h1>

<p align="center">:calling: 一款满足你的多种发送需求的短信发送组件</p>

## 特点
1. 支持多家服务商
1. 一套写法兼容所有平台
1. 简单配置即可灵活增加服务商
1. 统一的返回格式
1. 支持白名单
1. 更多等你去发现与改进

## 平台支持
- [253云通讯（创蓝）](https://www.253.com/)
- 后续多平台支持待完善......

## 环境需求

- PHP >= 5.6

## 安装

```shell
$ composer require "len/sms-extend"
```

## 使用

1. 在config目录下面新增sms.php配置文件，对应的配置内容
```
/*
|--------------------------------------------------------------------------
| SMS CONFIG
|--------------------------------------------------------------------------
|
| This is about the configuration of the docking SMS platform.
|
| Supported: "253 cloud communication（创蓝） "
|
 */
return [
    //默认网关
    'default_gateways' => 'chuanglan',

    //可用的网关配置
    'gateways'         => [
        'chuanglan' => [
            'account'  => 'N2928615',
            'password' => '4dcvbiUnj',
        ],
    ],
    //白名单，建议测试环境下新增该配置，避免测试时发送真实的短信
    'white_list'       => [],
];

```
2. 在config/app.php 的 providers数组里面增加以下内容
```

```


```php
use Len\SmsExtend\SmsExtend;

SmsExtend::send("13800309304", "短信验证码是：000000");
```

