<?php

namespace App\Models;

use App\Http\Controllers\PortalConnectionController;
use App\Http\Controllers\SeoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        'advanced_price',
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

    public function getProductsByIds($id) {
        $product = [];
        if($id) {
            $product = Product::whereIn('id', $id)->get();
        }
        return $product;
    }

    public function getProductBySlug($slug) {
        $product = Product::where('slug', $slug)->first();
        $product = Product::getPrices($product);
        $product = SeoController::tagReplacer($product);
        $product->photo = Gallery::getPhotosByUrl($product->photo);
        $product->fields = Product::getProductFieldsValue($product);
        return $product;
    }

    public function getProductFieldsValue($product) {
        $result = [];
        if(!empty($product) && $product->fields) {
            $arrFieldsId = [];
            $fields = json_decode($product->fields);
            if ($fields) {
                foreach ($fields as $key => $field) {
                    $arrFieldsId[] = $key;
                }
            }
            $request = new Request();
            $prt = new PortalConnectionController();
            $request['id'] = implode(',', $arrFieldsId);
            $portalFields = $prt->getFieldsByIds($request);
            $fields = (array)$fields;
            if ($portalFields && is_array($portalFields)){
                foreach ($portalFields as $item) {
                    $result[$item->title] = !empty($fields[$item->id]) ? $fields[$item->id] : "";
                }
            }
        }
        return $result;
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

    public function getPrices($product) {
        if($product && !empty($product->advanced_price)) {
            $product->advanced_price = json_decode($product->advanced_price);
        }
        return $product;
    }

    public function getSaleProducts() {
        $products = Product::whereNotNull("advanced_price")->paginate(12);
        $products = Gallery::getOncePhotoForCollectionItems($products);
        return $products;
    }


}
