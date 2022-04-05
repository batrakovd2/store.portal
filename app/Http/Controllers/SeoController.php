<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SeoController extends Controller
{
    public function tagReplacer($obj) {
        if(!empty($obj) && !empty($obj->meta_title)) {
            $obj->meta_title = self::replaceTitle($obj->meta_title, $obj->title);
            $obj->meta_title = self::replaceCity($obj->meta_title);
            $obj->meta_title = self::replaceVCity($obj->meta_title);
        }
        if(!empty($obj) && !empty($obj->meta_description)) {
            $obj->meta_description = self::replaceTitle($obj->meta_description, $obj->title);
            $obj->meta_description = self::replaceCity($obj->meta_description);
            $obj->meta_description = self::replaceVCity($obj->meta_description);
        }
        if(!empty($obj) && !empty($obj->meta_keywords)) {
            $obj->meta_keywords = self::replaceTitle($obj->meta_keywords, $obj->title);
            $obj->meta_keywords = self::replaceCity($obj->meta_keywords);
            $obj->meta_keywords = self::replaceVCity($obj->meta_keywords);
        }
        return $obj;
    }

    protected static function replaceTitle($meta, $title) {
        if(strrpos($meta, "%%title%%") !== false) {
            $meta = str_replace("%%title%%", $title, $meta);
        }
        return $meta;
    }

    protected static function replaceCity($meta) {
        if(strripos($meta, "%%gorod%%") !== false) {
            $host = $_SERVER['HTTP_HOST'];
            $city = Cache::remember('global_vcity_'.$host, now()->addDay(1), function (){
                $company = Company::first();
                $id = $company->city_id;
                $prtl = new PortalConnectionController();
                return $prtl->getCity($id);
            });
            $meta = str_replace("%%gorod%%", $city->title, $meta);
        }
        return $meta;
    }

    protected static function replaceVCity($meta) {
        if(strripos($meta, "%%vgorode%%") !== false) {
            $host = $_SERVER['HTTP_HOST'];
            $city = Cache::remember('global_vcity_'.$host, now()->addDay(1), function (){
                $company = Company::first();
                $id = $company->city_id;
                $prtl = new PortalConnectionController();
                return $prtl->getCity($id);
            });
            $meta = str_replace("%%vgorode%%", $city->vtitle, $meta);
        }
        return $meta;
    }
}
