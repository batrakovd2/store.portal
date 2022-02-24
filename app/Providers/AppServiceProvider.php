<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Facades\Cache;
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
            $category = Cache::remember('global_category_nesting', now()->addDay(1), function () {
                return Category::getCategoryNesting();
            });
            $company = Cache::remember('global_company', now()->addDay(1), function () {
                return Company::getCompany();
            });
            $view->globalCategories = $category;
            $view->globalCompany = $company;
        });
    }
}
