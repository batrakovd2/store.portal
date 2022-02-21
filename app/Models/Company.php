<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'domain', 'address', 'phone', 'email', 'city_id', 'raiting', 'work_time'];

    public function getCompany() {
        return Company::first();
    }
}
