<?php


namespace Ifucloud\Signature;


use Illuminate\Support\ServiceProvider;

class IfucloudSignatureProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( realpath( __DIR__ . '/config/sign.php' ), 'sign' );
        $this->mergeConfigFrom( realpath( __DIR__ . '/config/exceptions.php' ), 'exceptions' );
    }

    /**
     * 初始化基础文件
     */
    public function boot()
    {
        //
    }
}
