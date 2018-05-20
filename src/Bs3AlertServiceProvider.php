<?php 

namespace TJGazel\Bs3Alert;

use TJGazel\Bs3Alert\Bs3Alert;
use Illuminate\Support\ServiceProvider;

class Bs3AlertServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('bs3-alert.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/bs3-alert')
        ], 'template');

        $this->loadViewsFrom(__DIR__ . '/../views', 'bs3-alert');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Bs3Alert::class, function ($app) {
            return new Bs3Alert($app['session'], $app['config']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Bs3Alert::class];
    }
}
