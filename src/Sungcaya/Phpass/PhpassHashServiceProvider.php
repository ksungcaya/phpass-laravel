<?php namespace Sungcaya\Phpass;

use Sungcaya\Phpass\PhpassHasher;
use Hautelook\Phpass\PasswordHash;
use Illuminate\Support\ServiceProvider;

class PhpassHashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        // Register the config publish path
        $this->publishes([
            __DIR__.'/../../../config/phpass.php' => config_path('phpass.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // merge default config from the app config
        $this->mergeConfigFrom(
            __DIR__.'/../../../config/phpass.php', 'phpass'
        );

        $iterationCount = $this->app['config']->get('phpass.iteration_count');
        $portableHashes = $this->app['config']->get('phpass.portable_hashes');

        $this->app->singleton('hash', function () use ($iterationCount, $portableHashes)
        { 
            return new PhpassHasher(
                new PasswordHash($iterationCount, $portableHashes)
            ); 
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['hash'];
    }
}
