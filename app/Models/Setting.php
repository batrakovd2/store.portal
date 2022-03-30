<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ["name", "value"];

    public function getSettings() {
        $settings = Setting::get()->keyBy('name')->toArray();
        $settings["banner_items"]["value"] = json_decode($settings["banner_items"]['value']);
        return $settings;
    }

    public function getSettingByName($name) {
        return Setting::where("name", $name)->first();
    }

}
