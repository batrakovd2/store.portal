<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog() {
        $categories = Category::getAllParentCategories();
        return view('templates.'. $this->template .'.static.catalog', compact('categories', $categories));
    }
}
