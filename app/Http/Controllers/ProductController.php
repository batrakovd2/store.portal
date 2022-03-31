<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::getProductBySlug($slug);
        if(!empty($product)) {
            $category = $product->category;
            $breadcrumps = CategoryController::getCategoryChildChain($category->id);
            return view('templates.'. $this->template .'.product.show', [
                'product' => $product,
                'category' => $category,
                'breadcrumps' => $breadcrumps
            ]);
        } else {
            abort(404);
        }
    }
}
