<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog() {
        return view('main-template.static.catalog');
    }
}
