<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductChange;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $popCategories = Category::getPopRootCategories(6);
        $saleProducts = Product::getSaleProducts();
        return view('home', compact([
            ["popCategories", $popCategories],
            ["saleProducts", $saleProducts]
        ]));
    }
}
