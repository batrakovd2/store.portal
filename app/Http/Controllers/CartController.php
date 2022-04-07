<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use App\Traits\CookieService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    use CookieService;

    protected $cartkey = "cart";

    public function index() {
        $products = $this->getProductsFromCookies();
        return view('templates.'. $this->template .'.static.cart', ["products" => $products]);
    }

    public function addToCart($productId) {
        if($productId) {
            $cookieArr = ['id' => $productId, 'count' => 1];
            $this->setCookie($this->cartkey, $cookieArr);
        }
        return [
                "res"       => 1,
                "desc"      => "Удалить",
                "toggle"    => true
        ];
    }

    public function removeFromCart($productId) {
        $this->removeElementFromCookieById($this->cartkey, $productId);
        return [
            "res"       => 1,
            "desc"      => "Удалить",
            "toggle"    => true,
            "card"      => [
                "count" => 1,
                "total_price" => 1
            ]
        ];
    }

    public function incCountProductCart() {

    }

    public function getProductsFromCookies() {
        $prodIdStr = $this->getCookie($this->cartkey);
        $prodIds = $this->getIdsFromCookieArr($prodIdStr);
        $products = Product::getProductsByIds($prodIds);
        foreach ($products as $prod) {
            $prod = Product::getPrices($prod);
            $prod->photo = Gallery::getPhotosByUrl($prod->photo);
        }
        return $products;
    }


}
