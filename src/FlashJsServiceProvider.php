<?php

namespace FlashJs\FlashJsUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FlashJsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/flashjs.php', 'flashjs');
    }

    public function boot()
    {
        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'flash');

        // Publish config + assets
        $this->publishes([
            __DIR__ . '/../config/flashjs.php' => config_path('flashjs.php'),
        ], 'flashjs-config');

        $this->publishes([
            __DIR__ . '/../resources/js/flashjs.js' => resource_path('js/vendor/flashjs.js'),
        ], 'flashjs-js');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/flash'),
        ], 'flashjs-views');

        // Register Blade components
        Blade::component('flash::components.flash.dropdown', 'flash-dropdown');
        Blade::component('flash::components.flash.modal', 'flash-modal');
        Blade::component('flash::components.flash.select', 'flash-select');
        Blade::component('flash::components.flash.datepicker', 'flash-datepicker');
        Blade::component('flash::components.flash.chart', 'flash-chart');
        Blade::component('flash::components.flash.editor', 'flash-editor');
    }
}
