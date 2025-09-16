<?php

namespace App\Providers;

use App\Models\ContactMessage;
use App\Models\Team;
use Illuminate\Support\ServiceProvider;
use View;

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
        // مشاركة المتغير مع كل الـ Views
        View::share('team', Team::latest()->get());
        View::share('contacts', ContactMessage::latest()->get());
    }
}
