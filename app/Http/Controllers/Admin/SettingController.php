<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
        public function index() {
            $settings = Setting::getSettings();
            return view('admin.settings.index', ["settings" => $settings]);
        }

        public function update(Request $request) {
            $keys = $request->keys();
            $settings = Setting::get();
            try {
                foreach ($settings as $stngs) {
                    $settingsNew = [
                        "name" => $stngs->name,
                        "value" => $this->correctSettingsValue($request, $stngs->name)
                    ];
                    $stngs->update($settingsNew);
                    Cache::flush();
                }
                $result = 'success';
                $description = "Настройки сохранены";
            } catch (\Exception $e) {
                $result = 'error';
                $description = "Произошла ошибка при изменении настроек";
            }

            return array("status" => $result, "desc" => $description);
        }

        public function correctSettingsValue($request, $key) {
            if($request->input($key) == "on") {
                 return 1;
            }
            if($key == "banner_items") {
                $json = $request->input("photo") ? $request->input("photo") : [];
                return json_encode($json);
            }
            if($key == "background") {
                return $request->input("background") ? $request->input("background") : [];
            }
            return 0;
        }



}
