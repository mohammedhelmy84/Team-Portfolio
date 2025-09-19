<?php

namespace App\Providers;

use App\Models\Contact;
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
        View::share('contacts', Contact::latest()->get());


            // مشاركة بيانات الإشعارات مع الـ navbar
        View::composer('admin.partials.navbar', function ($view) {
            $unreadCount = Contact::where('is_read', false)->count();
            $unreadContacts = Contact::where('is_read', false)->latest()->take(5)->get();

            $view->with(compact('unreadCount', 'unreadContacts'));
        });

    }
}
