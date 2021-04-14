<?php

/**
 * 🚀 A Laravel package that focuses on minimizing payload size of HTML document
 *    and optimizing processing on the browser when rendering the web page.
 *
 * @copyright 2021 Mai Nhut Tan https://code.shin.company.
 * @package   shinsenter/defer-laravel
 * @see       https://github.com/shinsenter/defer-laravel
 */

namespace AppSeeds\DeferLaravel;

use AppSeeds\Defer;
use AppSeeds\Helpers\DeferOptions;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class DeferServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                $this->configPath() => config_path('defer-laravel.php'),
            ], 'defer-laravel');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('defer-laravel');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom($this->configPath(), 'defer-laravel');

        // Register the main class to use with the facade
        $this->app->singleton(Defer::class, function ($app) {
            return new Defer('', $this->getOptions());
        });
    }

    protected function configPath()
    {
        return __DIR__ . '/../config/defer-laravel.php';
    }

    protected function getOptions()
    {
        $options = $this->app['config']->get('defer-laravel');
        $default = (new DeferOptions())->getOptionArray();

        foreach ($options as $k => $v) {
            if (!isset($default[$k])) {
                unset($options[$k]);
            }
        }

        return $options;
    }
}
