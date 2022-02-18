<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_name',
        'meta_description',
        'meta_keywords',
    ];

    public function getPages($limit = 20) {
        return Page::orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getPage($id) {
        return Page::find($id);
    }
}
