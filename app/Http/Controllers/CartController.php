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

    public function addToCart(Request $request) {
        $productId = $request->input('id');
        if($productId) {
            $cookieArr = ['id' => $productId, 'count' => 1];
            $this->addCookieAsArray($this->cartkey, $cookieArr);
        }
        return [
                "res"       => 1,
                "desc"      => "Удалить",
                "toggle"    => true
        ];
    }

    public function removeFromCart(Request $request) {
        $productId = $request->input('id');
        $count = $request->input('count');
        $this->removeElementFromCookieById($this->cartkey, $productId);
        $prod_ids = !empty($_COOKIE[$this->cartkey]) ? json_decode($_COOKIE[$this->cartkey]) : [];
        $total = $this->getTotalValues($productId, $count, $prod_ids);
        return [
            "res"       => 1,
            "desc"      => "Удалить",
            "toggle"    => true,
            "card"      => [
                "count" => $total->totalCount,
                "total_price" => $total->totalPrice
            ]
        ];
    }

    public function countProductCart(Request $request) {
        $productId = $request->input('id');
        $count = $request->input('count');

        if(!empty($_COOKIE[$this->cartkey])) {
            $prod_ids = json_decode($_COOKIE[$this->cartkey]);
            if($prod_ids and count($prod_ids)) {
                $newPart = [];
                foreach ($prod_ids as $key => $pi) {
                    if(!empty($pi->id) and $pi->id == $productId) {
                        $newPart[] = [
                            'id' => $pi->id,
                            'count' => $count
                        ];
                    } else {
                        $newPart[] = [
                            'id' => $pi->id,
                            'count' => $pi->count
                        ];
                    }
                }
                $this->setCookie($this->cartkey, $newPart);
            }
        }

        $total = $this->getTotalValues($productId, $count, $prod_ids);

        return [
            "res"       => 1,
            "desc"      => "В корзине",
            "toggle"    => true,
            "count"     => $count,
            "card"      => [
                "count" => $total->totalCount,
                "total_price" => $total->totalPrice
            ]
        ];

    }

    public function getTotalValues($productId, $count, $prodCookie) {
        $result = (object)[];
        if($prodCookie and count($prodCookie)) {
            $totalPrice = 0;
            $totalCount = 0;
            $product = Product::getProduct($productId);
            foreach ($prodCookie as $key => $pi) {
                $prodCount = $pi->count;
                if(!empty($pi->id) and $pi->id == $productId) {
                    $totalCount += $count;
                    $totalPrice += ((int) $product->price * $count);
                } else {
                    $prodPrice = Product::getPriceById($pi->id);
                    if($prodPrice) {
                        $totalPrice += ((int) $prodPrice * $prodCount);
                    }
                    $totalCount += $prodCount;
                }
            }
        }
        $result->totalCount = $totalCount;
        $result->totalPrice = $totalPrice;
        return $result;

    }

    public function getProductsFromCookies() {
        $prodIdStr = $this->getCookie($this->cartkey);
        $prodIds = $this->getIdsFromCookieArr($prodIdStr);
        $products = Product::getProductsByIds($prodIds);
        foreach ($products as $prod) {
            $prod = Product::getPrices($prod);
            $prod->photo = Gallery::getPhotosByUrl($prod->photo);
            $cookieProdArr = $this->getArrFromCookieById($prod->id, $this->cartkey);
            $prod->count = !empty($cookieProdArr['count']) ? $cookieProdArr['count'] : 1;
        }
        return $products;
    }

    public function removeElementFromCookieById($cookiekey, $id)
    {
        $host = $_SERVER['HTTP_HOST'];
        if (!empty($_COOKIE[$cookiekey])) {
            $prod_ids = json_decode($_COOKIE[$cookiekey]);
            if ($prod_ids and count($prod_ids)) {
                $newPart = [];
                foreach ($prod_ids as $key => $pi) {
                    if (!empty($pi->id) and $pi->id == $id) {

                    } else {
                        $newPart[] = [
                            'id' => $pi->id,
                            'count' => $pi->count
                        ];
                    }
                }
                setcookie($cookiekey, json_encode($newPart), time() + 360000, '/', $host);
            }
        }
    }


    public function getItemInCart($collect) {
        if($collect) {
            $cookie = $this->getCookie($this->cartkey);
            $itemId = $this->getIdsFromCookieArr($cookie);
            foreach ($collect as $item) {
                $item->in_cart = in_array($item->id, $itemId) ? true : false;
            }
        }

        return $collect;
    }




}
