<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ["photo", "description", "status"];

    public function getPhoto($limit) {
        return Gallery::orderBy('created_at', 'desc')->paginate($limit);
    }

}
