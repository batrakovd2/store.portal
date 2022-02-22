<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'status', 'date', 'photo', 'meta_title', 'meta_description', 'meta_keywords'];

    public function getNews($limit) {
        return News::orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getOnceNews($id) {
        return News::where("id", $id)->first();
    }

}
