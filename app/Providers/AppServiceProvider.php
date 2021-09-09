<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Eloquent\Model;

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
        Model::preventLazyLoading(! app()->isProduction());

        Schema::defaultStringLength(191);
        view()->composer(['layouts.admin'], 'App\Http\Composers\GlobalComposer');

        Password::defaults(function () {
            $rule = Password::min(6);
            return $this->app->isProduction()
                ? $rule->mixedCase()->uncompromised(3)
                : $rule;
        });
    }
}
