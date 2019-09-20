<?php
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
            'account'  => '',
            'password' => '',
        ],
        'chuanglan_abroad' => [
            'account'  => '',
            'password' => '',
        ],
    ],
    //白名单,建议测试环境下新增该配置，避免测试时发送真实的短信
    'white_list'       => [],
];
