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

    public function getImagePath($gallery) {
        if($gallery) {
            $PORTAL_URL = config('app.img_portal');
            $gallery->map(function($item) use ($PORTAL_URL) {
                $fullUrl = !empty($item->photo) ? $PORTAL_URL. '/' .$item->photo : $item->photo;
                $imgExist = Gallery::checkImage($fullUrl);
                if($imgExist) {
                    $item->photo = $fullUrl;
                } else {
                    $item->photo = asset('img/placeholder.jpg');
                }
            });
        }
        return $gallery;
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
