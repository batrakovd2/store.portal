<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductChange;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $popCategories = [];
        $saleProducts = [];
        $host = $_SERVER['HTTP_HOST'];
        $settings = Cache::get("global_settings_".$host);
        $settings = $settings ? $settings : Setting::getSettings();

        if($settings['popular_categories']['value'])
            $popCategories = Category::getPopRootCategories(6);

        if($settings['sales_products']['value'])
            $saleProducts = Product::getSaleProducts();

        return view('templates.'. $this->template .'.home', compact([
            ["popCategories", $popCategories],
            ["saleProducts", $saleProducts]
        ]));
    }
}
