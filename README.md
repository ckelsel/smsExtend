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
- [云片](https://www.yunpian.com/)
- 后续多平台支持待完善......

## 环境需求

- PHP >= 5.6

## 安装

```shell
$ composer require "len/sms-extend"
```

## 使用

1. 在config目录下创建sms.php 文件，需运行以下命令：
```
$ php artisan vendor:publish
该命令会弹出选项，选择（Provider: Len\SmsExtend\Providers\SmsExtendServiceProvider）选项,即创建成功
```

2. 在config/sms.php配置文件里面，配置短信平台的账号等相关信息

3. 调用SmsExtend发送短信：
```php
use Len\SmsExtend\SmsExtend;

$mobile_phone = "13788889999";
$message      = "短信验证码是：000000";
$gatewayName = "网关名称";//以sms.php里面配置的网关为准，不传则取默认网关
$result       = SmsExtend::send($mobile_phone, $message, $gatewayName);
```

4. 关于发送短信返回数据结构及说明：
```
{
    "code":0,
    "message":"success",
    "data":{}
}
code:状态码，大于0标识返回发送失败,反之0即表示发送成功
message:发送失败时对应的错误内容提示
data:短信服务商返回的对应数据
```

## 关于支持平台的配置说明

### 253云通讯（创蓝）
```
'chuanglan' => [
    'account'  => '', //调用发送短信API账号
    'password' => '', //调用发送短信API密码
]
```

### 云片
```
'yunpian' => [
    'apikey'  => '', //平台key
]
```