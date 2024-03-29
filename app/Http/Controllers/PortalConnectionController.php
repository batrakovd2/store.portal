<?php

namespace App\Http\Controllers;

use App\Traits\CURLRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Log;

class PortalConnectionController extends Controller
{
    use CURLRequest;

    private $PORTAL_URL;

    public function __construct()
    {
        $this->PORTAL_URL = config('app.portal');
    }

    public function getFields() {
        $api = $this->PORTAL_URL.'/api/field/get';
        $fields = Cache::remember('portal_all_fields', now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $fields = $response ? json_decode($response) : [];
        });
        return $fields;
    }

    public function getFieldsByIds(Request $request) {
        $id = $request->input('id');
        $id = $id ?? 0;
        $params = array("id" => $id);
        $api = $this->PORTAL_URL.'/api/fields/get';
        $response = $this->postRequest($api, $params);
        $fields = $response ? json_decode($response) : [];
        return $fields;
    }

    public function getUnits() {
        $api = $this->PORTAL_URL.'/api/units/get';
        $units = Cache::remember('portal_all_units', now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $units = $response ? json_decode($response) : [];
        });
        return $units;
    }

    public function getRubricChild(Request $request) {
        $id = $request->input('id');
        $id = $id ?? 0;
        $api = $this->PORTAL_URL.'/api/rubric/getChild/'.$id;
        $rubric = Cache::remember('portal_child_rubrics_'.$id, now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $rubric = $response ? json_decode($response) : [];
        });
        return $rubric;
    }

    public function getRubric($id) {
        $id = $id ?? 0;
        $api = $this->PORTAL_URL.'/api/rubric/get/'.$id;
        $rubric = Cache::remember('portal_rubric_'.$id, now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $rubric = $response ? json_decode($response) : [];
        });
        return $rubric;
    }

    public function getRubricChildChain($id) {
        $id = $id ?? 0;
        $api =  $this->PORTAL_URL.'/api/rubric/getChain/'.$id;
        $rubric = Cache::remember('portal_chain_rubric_'.$id, now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $rubric = $response ? json_decode($response) : [];
        });
        return $rubric;
    }

    public function getCity($id) {
        $host = $_SERVER['HTTP_HOST'];
        $id = $id ?? 0;
        $api =  $this->PORTAL_URL.'/api/city/get/'.$id;
        $city = Cache::remember('global_city_'.$host, now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $city = $response ? json_decode($response) : [];
        });
        return $city;
    }

    public function getCities(Request $request) {
        $id = $request->input('id');
        $id = $id ?? 0;
        $api =  $this->PORTAL_URL.'/api/city/getChild/'.$id;
        $city = Cache::remember('portal_cities_by_region_'.$id, now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $city = $response ? json_decode($response) : [];
        });
        return $city;
    }

    public function getCitiesChain($id) {
        $id = $id ?? 0;
        $api =  $this->PORTAL_URL.'/api/city/getChain/'.$id;
        $city = Cache::remember('portal_cities_chain_'.$id, now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $city = $response ? json_decode($response) : [];
        });
        return $city;
    }

    public function getDeliveries() {
        $api =  $this->PORTAL_URL.'/api/delivery/get';
        $deliveries = Cache::remember('portal_deliveries', now()->addDay(1), function () use ($api) {
            $response = file_get_contents($api);
            return $city = $response ? json_decode($response) : [];
        });
        return $deliveries;
    }
}
