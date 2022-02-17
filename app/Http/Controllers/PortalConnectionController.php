<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PortalConnectionController extends Controller
{
    private $PORTAL_URL = 'http://portal.loc/';

    public function getFields() {
        $response = file_get_contents($this->PORTAL_URL.'api/field/get');
        $fields = Cache::remember('portal_all_fields', now()->addDay(1), function () use ($response) {
            return $fields = $response ? json_decode($response) : [];
        });

        return $fields;
    }

    public function getUnits() {
        $response = file_get_contents($this->PORTAL_URL.'api/units/get');
        $units = Cache::remember('portal_all_units', now()->addDay(1), function () use ($response) {
            return $units = $response ? json_decode($response) : [];
        });

        return $units;
    }

    public function getRubricChild(Request $request) {
        $id = $request->input('id');
        $id = $id ?? 0;
        $response = file_get_contents($this->PORTAL_URL.'api/rubric/get/');
        $rubric = Cache::remember('portal_all_rubric_'.$id, now()->addDay(1), function () use ($response) {
            return $rubric = $response ? json_decode($response) : [];
        });
        return $rubric;
    }
}
