<?php

namespace Berthe\Codegenerator;

use Illuminate\Support\ServiceProvider;

class CodeGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'templates');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Berthe\Codegenerator\CodeGeneratorController');
	$this->app->make('Berthe\Codegenerator\FileGenerator');
    }
}
