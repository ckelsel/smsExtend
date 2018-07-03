<?php
namespace Len\SmsExtend\Providers;

use Illuminate\Support\ServiceProvider;
use Len\SmsExtend\SmsExtend;

/**
 *
 * @authors chenfeng (wangchenfeng@xdqcjy.com)
 * @date    2018-07-02 16:36:57
 * @version V1
 */
class SmsExtendServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     * 
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-07-02
     * @return void
     */
    public function boot()
    {
        //发布指定配置
        $this->publishes([
            __DIR__.'/../../config/sms.php' => config_path('sms.php')
        ]);
    }

    /**
     * Register the service provider
     * 
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-07-02
     * @return void
     */
    public function register($value='')
    {
        $this->registerSmsExtend();
    }


    public function registerSmsExtend()
    {
        //注册服务
        $this->app->bind('smsExtend', function ($app) {
            return new SmsExtend();
        });
    }
}
