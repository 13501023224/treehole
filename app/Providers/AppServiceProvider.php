<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
//        $this->app['request']->server->set('HTTPS', $this->app->environment() != 'local');      //让Laravel支持https，且区分本地
        $url->forceScheme('https'); //这里用https，没有的话自己添加下
    }
}
