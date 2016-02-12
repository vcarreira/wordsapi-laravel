<?php

namespace WordsApi;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider for the {@link https://github.com/vcarreira/wordsapi WordsAPI service}.
 *
 * @author     Vitor Carreira
 *
 * @link       https://github.com/vcarreira
 */
class WordsApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the configuration.
     */
    public function boot()
    {
        $this->copyConfig();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->checkRequiredExtensions();
        $this->addBindings();
        $this->addsDefaultSettings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [WordService::class];
    }

    private function copyConfig()
    {
        $this->publishes([
            __DIR__.'/config/wordsapi.php' => config_path('wordsapi.php'),
        ]);
    }

    private function addBindings()
    {
        $this->app->bind('wordsapi', function () {
            return new WordService(
                app('config')->get('wordsapi.api_key'),
                app('config')->get('wordsapi.options.curl_timeout', 5)
            );
        });
    }

    private function addsDefaultSettings()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/wordsapi.php',
            'wordsapi'
        );
    }

    private function checkRequiredExtensions()
    {
        if (!function_exists('curl_init')) {
            throw new NotSupportedException(
                'The curl extension must be loaded in order to be able to use this class'
            );
        }
    }
}
