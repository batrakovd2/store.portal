<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class CustomAuthController extends Controller
{

    public function checkToken(Request $request) {
        $token = $request->input('token');
//        dd($this->checkKey($token), $this->checkingRelevanceToken($token) );
        if($this->checkKey($token) && $this->checkingRelevanceToken($token)) {
            $user = User::where('token', $token)->first();
            Auth::login($user);
            return redirect('admin');
        } else {
            Log::info("Key failed");
        }
    }

    private function checkingRelevanceToken($token) {
        $user = User::where('token', $token)->first();
        $tokenTime = !empty($user->token_live_time) && $user->token_live_time ? strtotime(date($user->token_live_time)) : 0;
        $realTime = strtotime(date('Y-m-d H:i:s'));
        if($realTime - $tokenTime < 120) {
            return true;
        } else {
            return false;
        }
    }

    private function checkKey($token) {
        try {
            $decryptToken = Crypt::decrypt($token);
            $key = explode("|", $decryptToken);
            $key = end($key);
            return $key == "JCQr!1QNy2EST3" ? true : false;
        } catch (\Exception $e) {
            return false;
        }
    }

}
