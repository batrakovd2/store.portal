<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Setting;
use Dotenv\Dotenv;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {

            $host = $_SERVER['HTTP_HOST'];

            $settings = Cache::remember('global_settings_'.$host, now()->addDay(1), function () {
                return Setting::getSettings();
            });

            $template = Cache::remember('global_template_'.$host, now()->addDay(1), function () use ($settings) {
                return $settings['template']['value'] ? $settings['template']['value'] : 'main-template';
            });

            $company = Cache::remember('global_company_'.$host, now()->addDay(1), function () {
                return Company::getCompany();
            });

            $category = Cache::remember('global_category_nesting_'.$host, now()->addDay(1), function () {
                return Category::getCategoryNesting();
            });

            $view->appSettings = $settings;
            $view->appTemplate = $template;
            $view->globalCategories = $category;
            $view->globalCompany = $company;
        });
    }
}
