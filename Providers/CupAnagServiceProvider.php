<?php

namespace Modules\CupAnag\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class CupAnagServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('CupAnag', 'Database/Migrations'));
        $this->cupparisPublish();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('CupAnag', 'Config/config.php') => config_path('cupanag.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('CupAnag', 'Config/config.php'), 'cupanag'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/cupanag');

        $sourcePath = module_path('CupAnag', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/cupanag';
        }, \Config::get('view.paths')), [$sourcePath]), 'cupanag');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/cupanag');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'cupanag');
        } else {
            $this->loadTranslationsFrom(module_path('CupAnag', 'Resources/lang'), 'cupanag');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
//        if (! app()->environment('production') && $this->app->runningInConsole()) {
//            app(Factory::class)->load(module_path('CupAnag', 'Database/factories'));
//        }
    }

    public function cupparisPublish()
    {
        $this->publishes([
            __DIR__ . '/../Config/foorms' => config_path('foorms'),
        ], 'config');

        $this->publishes([
//            __DIR__ . '/../app/Console/Commands' => app_path('Console/Commands'),
            __DIR__ . '/../app/Models' => app_path('Models'),
            __DIR__ . '/../app/Models/Relations' => app_path('Models/Relations'),
            __DIR__ . '/../app/Policies' => app_path('Policies'),
            __DIR__ . '/../app/Foorm' => app_path('Foorm'),
            ], 'models');

        $this->publishes([
            __DIR__ . '/../public/admin/ModelConfs' => public_path('admin/ModelConfs'),
            __DIR__ . '/../public/admin/pages' => public_path('admin/pages'),
            __DIR__ . '/../public/admin/components/js' => public_path('admin/components/js'),
            __DIR__ . '/../public/admin/components/templates' => public_path('admin/components/templates'),
        ], 'public');

    }
        /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
