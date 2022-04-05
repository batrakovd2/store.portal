<?php

namespace App\Models;

use App\Http\Controllers\SeoController;
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
        'meta_title',
        'meta_description',
        'meta_keywords',
        'view'
    ];

    public function getCategory($id) {
        $category = Category::where('id', $id)->first();
        return $category;
    }

    public function getCategoryBySlug($slug) {
        $category = Category::where('slug', $slug)->first();
        $category = SeoController::tagReplacer($category);
        return $category;
    }

    public function getCategories($limit = 20) {
        return Category::orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getAllParentCategories() {
        $category = Category::where("parent_id", null)->orWhere("parent_id", 0)->get();
        $category = Gallery::getOncePhotoForCollectionItems($category);
        return $category;
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

    public function getPopRootCategories($limit) {
        $categories = Category::whereNotNull("view")->where("parent_id", 0)->orderBy("view", "desc")->limit($limit)->get();
        $categories = Gallery::getOncePhotoForCollectionItems($categories);
        return $categories;
    }

    public function addViewed($category) {
        if(!empty($category)){
            $category->view = $category->view + 1;
            if(!empty($category->children)) unset($category->children);
            $category->save();
        }
    }

    public function addViewedById($id) {
        $category = Category::getCategory($id);
        if(!empty($category)) {
            $category->view = $category->view + 1;
            $category->save();
        }
    }



}
