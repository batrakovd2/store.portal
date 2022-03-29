<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'status', 'date', 'photo', 'meta_title', 'meta_description', 'meta_keywords'];

    public function getNews($limit) {
        $news = News::orderBy('created_at', 'desc')->paginate($limit);
        $news = Gallery::getOncePhotoForCollectionItems($news);
        return $news;
    }

    public function getOnceNews($id) {
        return News::where("id", $id)->first();
    }

    public function getNewsBySlug($slug) {
        $news = News::where('slug', $slug)->first();
        $news->photo = Gallery::getPhotosByUrl($news->photo);
        return $news;
    }

}
