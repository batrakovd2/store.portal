<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $template;
//
    public function __construct() {
        $this->template();
    }

    public function template() {
        $host = $_SERVER['HTTP_HOST'];

        $settings = Cache::remember('global_settings_'.$host, now()->addDay(1), function () {
            return Setting::getSettings();
        });

        $template = Cache::remember('global_template_'.$host, now()->addDay(1), function () use ($settings) {
            return $settings['template']['value'] ? $settings['template']['value'] : 'main-template';
        });

        $this->template = $template;
    }
}
