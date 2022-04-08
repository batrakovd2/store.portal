<?php

namespace App\Traits;

trait CookieService {

    public function setCookie($key, $value)
    {
        $host = $_SERVER['HTTP_HOST'];
        setcookie($key, json_encode($value), time()+360000, '/', $host);
    }

    public function getCookie($key) {
        $cookie = !empty($_COOKIE[$key]) ? json_decode($_COOKIE[$key], true) : null;
//        dd($cookie);
        return $cookie;
    }

    public function addCookieAsArray($key, $value) {
        $host = $_SERVER['HTTP_HOST'];
        $cookie = $this->getCookie($key);
        if(!empty($cookie)) {
            if(!in_array($value, $cookie)) {
                array_push($cookie, $value);
                $this->setCookie($key, $cookie);
            }
        } else {
            $cookieJson = json_encode([$value]);
            setcookie($key, $cookieJson, time()+36000, '/', $host);
        }
    }

    public function getIdsFromCookieArr($cookie) {
        $result = [];
        if(!empty($cookie) && is_array($cookie)) {
            foreach ($cookie as $ck) {
                if(!empty($ck['id']))
                    $result[] = $ck['id'];
            }
        }
        return $result;
    }

    public function getArrFromCookieById($id, $key) {
        $result = [];
        $cookie = $this->getCookie($key);
        if(!empty($cookie) && is_array($cookie)) {
            foreach ($cookie as $ck) {
                if(!empty($ck['id']) && $id == $ck['id']) {
                    $result = $ck;
                }
            }
        }
        return $result;
    }

    public function objectToArr($obj) {
        if(!empty($obj) && is_array($obj))
            foreach ($obj as &$o)
                $o = (array) $o;
         return $obj;
    }


    public function clearCookie($key) {
        unset($_COOKIE[$key]);
    }

}
