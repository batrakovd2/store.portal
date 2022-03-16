<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'prod_id',
        'category_id',
        'rubric_id',
        'up_text',
        'down_text',
        'price',
        'fields',
        'units',
        'view',
        'photo',
        'priority',
        'stock',
        'rating',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function getAllProducts($limit = 20) {
        return Product::orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getProduct($id) {
        return Product::where('id', $id)->first();
    }

    public function getProductsByArr($id) {
        $product = [];
        if($id) {
            $product = Product::whereIn('id', $id)->get()->toArray();
        }
        return $product;
    }

    public function getProductBySlug($slug) {
        return Product::where('slug', $slug)->first();
    }

    public function getProductByCategoryId($catId) {
        return Product::where('category_id', $catId)->paginate(20);
    }

    public function getProductByRubricId($rubId) {
        return Product::where('rubric_id', $rubId)->paginate(20);
    }

    public function getProductFields($id) {
        return Product::where('id', $id)->select('fields')->get();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getFieldsValuesForProduct($product, $fields) {
        if($product && $product->fields && $fields) {
            $prodFields = $product->fields ? json_decode($product->fields) : [];
            foreach ($fields as $fd) {
                foreach ($prodFields as $key=>$prf) {
                    if($fd->id == $key) {
                        $fd->value = $prf;
                    }
                }
            }
        }
        return $fields;
    }


}
