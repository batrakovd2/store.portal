<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    protected $fillable = ["question", "answer", "status"];

    public function getFAQ($id) {
        return FAQ::where([
            ["id", $id],
            ["status", 1]
        ])->first();
    }

    public function getActiveFAQs($limit = 10) {
        return FAQ::where("status", 1)->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function getFAQs($limit = 10) {
        return FAQ::orderBy('created_at', 'desc')->paginate($limit);
    }

}
