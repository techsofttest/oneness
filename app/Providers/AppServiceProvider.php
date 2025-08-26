<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

use Illuminate\Support\Facades\Db;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        RedirectIfAuthenticated::redirectUsing(function () {
        $user = auth()->user();

        if ($user && $user->role === 'admin') {
            return route('dashboard');
        }
        return route('my.account');
        });

         if (!$this->app->runningInConsole()) {
        $contact = DB::table("contacts")->first();
        \View::share('contact', $contact);
    }

    }
}
