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
        $category = Category::where('id', $id)->first();
        return $category;
    }

    public function getCategoryBySlug($slug) {
        return Category::where('slug', $slug)->first();
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

    public function getCategoryNesting() {
        $category = Category::get();
        $result = [];
        if($category) {
            foreach($category as $rb) {
                $child = [];
                if($rb->parent_id == 0) {
                    foreach ($category as $rbch) {
                        if($rb->id == $rbch->parent_id) {
                            $child[] = [
                                "id" => $rbch->id,
                                "title" => $rbch->title,
                                "slug" => $rbch->slug,
                                "parent_id" => $rbch->parent_id
                            ];
                        }
                    }
                    $result[] = [
                        "id" => $rb->id,
                        "title" => $rb->title,
                        "slug" => $rb->slug,
                        "parent_id" => $rb->parent_id,
                        "children" => $child
                    ];
                }
            }
        }
        return $result;
    }

    public function products() {
        return $this->hasMany(Product::class);
    }



}
