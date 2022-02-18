<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'parent_id',
        'photo',
        'meta_name',
        'meta_description',
        'meta_keywords',
    ];

    public function getCategory($id) {
        return Category::where('id', $id)->first();
    }

    public function getCategories($limit = 20) {
        return Category::orderBy('created_at', 'desc')->paginate($limit);
    }


    public function getAllParentCategories() {
        return Category::where("parent_id", null)->orWhere("parent_id", 0)->get();
    }

    public function getChildCategories($id) {
        return Category::where('parent_id', $id)->get();
    }

}
