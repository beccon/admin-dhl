<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationBuilder;
use App\Filament\Resources\EmpresaResource;
use App\Filament\Resources\ProjetoResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                'logout' => UserMenuItem::make()->label('Sair'),
            ]);
        });

    }
}
