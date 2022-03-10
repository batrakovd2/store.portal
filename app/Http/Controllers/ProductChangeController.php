<?php

namespace App\Http\Controllers;

use App\Models\ProductChange;
use Illuminate\Http\Request;

class ProductChangeController extends Controller
{
    public function getChanges() {
        return ProductChange::getChanges();
    }
}
