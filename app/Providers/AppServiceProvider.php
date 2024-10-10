<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

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
        if (empty(env('APP_KEY'))) {
            Artisan::call('key:generate --force');
        }

        config()->set([
            'app.env' => setting('site_environment', 'local'),
            'app.debug' => setting('development_mode', true),
            'app.locale' => Language::default()->code ?? 'en',
            'app.default_language' => Language::default()->code ?? 'en',
            'app.rtl' => Language::default()->is_rtl ? 'rtl' : 'ltr',
        ]);
        Paginator::defaultView('general.pagination.default');
    }
}
