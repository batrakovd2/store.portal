<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function about() {
        $page = Page::getPageBySlug('about');
        return view('templates.'. $this->template .'.static.about', [
            'page' => $page
        ]);
    }

    public function contacts() {
        $page = Page::getPageBySlug('contacts');
        return view('templates.'. $this->template .'.static.contacts', [
            'page' => $page
        ]);
    }

    public function sales() {
        $products = Product::getSaleProducts();
        return view('templates.'. $this->template .'.static.sales', [
            'saleProducts' => $products
        ]);
    }

    public function cart() {
        return view('templates.'. $this->template .'.static.cart');
    }
}
