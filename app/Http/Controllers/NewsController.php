<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news() {
        $news = News::getNews(20);
        return view('templates.'. $this->template .'.news.index', [
            'news' => $news
        ]);
    }

    public function show($slug)
    {
        $news = News::getNewsBySlug($slug);
        return view('templates.'. $this->template .'.news.show', [
            'news' => $news
        ]);
    }
}
