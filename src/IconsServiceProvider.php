<?php

namespace Nimbus\Icons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nimbus\Icons\Components\Icons;

class IconsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // <x-icons::plus/>
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'icons');

        //                Blade::component('icons', Icons::class);

        //        Blade::componentNamespace('Nimbus\\Icons\\View\\Components\\Icons', 'icons');
    }
}
