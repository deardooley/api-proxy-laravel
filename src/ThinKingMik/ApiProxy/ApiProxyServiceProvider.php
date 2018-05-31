<?php

/**
 * @package   thinkingmik/api-proxy-laravel
 * @author    Michele Andreoli <michi.andreoli[at]gmail.com>, Rion Dooley <deardooley[at]gmail.com>
 * @copyright Copyright (c) Michele Andreoli
 * @license   http://mit-license.org/
 * @link      https://github.com/thinkingmik/api-proxy-laravel
 */

namespace ThinKingMik\ApiProxy;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\JsonResponse;
use ThinKingMik\ApiProxy\Exceptions\ProxyException;

class ApiProxyServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/api-proxy.php' => config_path('api-proxy.php'),
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->mergeConfigFrom(__DIR__.'/../../config/api-proxy.php', 'api-proxy');
        $this->registerApiProxy();
    }

    /**
     * Register ApiProxy with the IoC container
     * @return void
     */
    public function registerApiProxy() {

        $this->app->singleton('api-proxy', function () {
            $params = $this->app['config']->get('api-proxy');
            $proxy = new Proxy($params);
            return $proxy;
        });

        $this->app->bind('ThinKingMik\ApiProxy\Proxy', function($app) {
            return $app['api-proxy'];
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [Proxy::class];
    }
}
