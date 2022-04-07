<?php

namespace App\Traits;

trait CookieService {

    public function setCookie($key, $value) {
//        $this->clearCookie($key);
//        dd($_COOKIE);
        $host = $_SERVER['HTTP_HOST'];
        $cookie = $this->getCookie($key);
        if(!empty($cookie)) {
            if(!in_array($value, $cookie)) {
                array_push($cookie, $value);
                $cookieJson = json_encode($cookie);
                setcookie($key, $cookieJson, time()+36000, '/', $host);
            }
        } else {
            $cookieJson = json_encode([$value]);
            setcookie($key, $cookieJson, time()+36000, '/', $host);
        }
    }

    public function getCookie($key) {
        $cookie = !empty($_COOKIE[$key]) ?  json_decode($_COOKIE[$key]) : null;
        if(!empty($cookie) && is_array($cookie))
            foreach ($cookie as &$ck)
                $ck = (array) $ck;
        return $cookie;
    }

    public function removeElementFromCookieById($cookiekey, $id) {
        $cookie = $this->getCookie($cookiekey);
        if(!empty($cookie) && is_array($cookie)) {
            foreach ($cookie as $key=>$ck) {
                if(!empty($ck['id']) && $ck['id'] == $id) {
                    unset($cookie[$key]);
                    $this->replaceCookie($cookie, $cookiekey);
                }
            }
        }
    }

    public function replaceCookie($cookie, $key) {
        $host = $_SERVER['HTTP_HOST'];
        $cookieJson = json_encode($cookie);
        setcookie($key, $cookieJson, time()+36000, '/', $host);
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


    public function clearCookie($key) {
        unset($_COOKIE[$key]);
    }

}
