<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug) {
        $category = Category::getCategoryBySlug($slug);
        if($category) {
            $category->children = $category ? Category::getChildCategories($category->id) : [];
            $products = $category->products()->paginate(2);
            $breadcrumbs = $this->getCategoryChildChain($category->id);
            $this->addViewed($category, $breadcrumbs);
            return view('main-template.category.category', [
                'category' => $category,
                'products' => $products,
                'breadcrumbs' => $breadcrumbs
            ]);
        } else {
            abort(404);
        }

    }

    public function addViewed($category, $breadcrumbs) {
        Category::addViewed($category);
        $rootCategory = array_shift($breadcrumbs);
        if(!empty($rootCategory['id'])) Category::addViewedById($rootCategory['id']);
    }

    public static function getCategoryChildChain($id, $chain_ch = []) {
        if($id) {
            $chain = Category::where('id', $id)->select('id', 'title', 'parent_id', 'slug')->first();
            if($chain) {
                $chain = $chain->toArray();
                array_unshift($chain_ch, [
                    'parent_id' => $chain['parent_id'],
                    'title' => $chain['title'],
                    'slug' => $chain['slug'],
                    'id' => $id
                ]);
            }
            if(!empty($chain['parent_id'])) {
                return self::getCategoryChildChain($chain['parent_id'], $chain_ch);
            }
            return $chain_ch;
        }
    }

}
