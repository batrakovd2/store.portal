<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = ["title", "delivery_type", "description", "price_info", "status"];

    public function getDeliveries() {
        return Delivery::get();
    }

    public function getDelivery($id) {
        $delivery = Delivery::find($id);
        $delivery->price_info = !empty($delivery->price_info) ? json_decode($delivery->price_info) : [];
        return $delivery;
    }

}
