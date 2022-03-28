<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ["photo", "description", "status"];

    public function getPhoto($limit) {
        return Gallery::orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getPhotos($count) {
        return Gallery::orderBy('created_at', 'desc')->offset($count)->limit(24)->get();
    }

    public function getImagePathCollect($gallery) {
        if($gallery) {
            $PORTAL_URL = config('app.img_portal');
            $gallery->map(function($item) use ($PORTAL_URL) {
                $fullUrl = !empty($item->photo) ? explode(',', $item->photo) : [];
                if(!empty($fullUrl) && count($fullUrl)) {
                    foreach ($fullUrl as $key=>$url) {
                        $fullUrl[$key] = !empty($url) ? $PORTAL_URL. '/' .$url : $url;
                    }
                }
                $item->photo = count($fullUrl) == 1 ? $fullUrl[0] : $fullUrl;
            });
        }
        return $gallery;
    }

    public function getImagePath($item) {
        if($item) {
            $PORTAL_URL = config('app.img_portal');
            $fullUrl = !empty($item->photo) ? explode(',', $item->photo) : "";
            if(!empty($fullUrl) && count($fullUrl)) {
                foreach ($fullUrl as $key=>$url) {
                    $fullUrl[$key] = !empty($url) ? $PORTAL_URL. '/' .$url : $url;
                }
            }
            $item->photo = $fullUrl;
        }
        return $item;
    }

    /* получение полного пути первой картинки. возвращает строку. */
    public function getPhotoByUrl($url) {
        $placeholder = asset("img/placeholder.jpg");
        $fullUrl = "";
        if(!empty($url) && !is_array($url)) {
            $PORTAL_URL = config('app.img_portal');
            $urlArr = explode(',', $url);
            $fullUrl = !empty($urlArr[0]) ? $PORTAL_URL. '/' .$urlArr[0] : $placeholder;
        }
        return $fullUrl ? $fullUrl : $placeholder;
    }

    /* получение полных путей картинок из строки. возвращает массив со строками путями. */
    public function getPhotosByUrl($url) {
        $placeholder = asset("img/placeholder.jpg");
        $fullUrl = "";
        if(!empty($url) && !is_array($url)) {
            $PORTAL_URL = config('app.img_portal');
            $fullUrl = explode(',', $url);
            if(!empty($fullUrl) && count($fullUrl)) {
                foreach ($fullUrl as $key=>$url) {
                    $fullUrl[$key] = !empty($url) ? $PORTAL_URL. '/' .$url : $placeholder;
                }
            }
        }
        return $fullUrl ? $fullUrl : [$placeholder];
    }

    public function getOncePhotoForCollectionItems($collect) {
        if(!empty($collect) && $collect) {
            $collect->map(function($item) {
                $item->photo = Gallery::getPhotoByUrl($item->photo);
            });
        }
        return $collect;
    }

    public function getPhotosForCollectionItems($collect) {
        if(!empty($collect) && $collect) {
            $collect->map(function($item) {
                $item->photo = Gallery::getPhotosByUrl($item->photo);
            });
        }
        return $collect;
    }



    public function checkImage($url) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 0,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return $httpCode == 200 ? true : false;

    }

}
