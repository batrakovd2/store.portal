<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function news() {
        $news = News::getNews(20);
        return view('main-template.news.index', [
            'news' => $news
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = News::getNews(20);
        return view('admin.news.index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug(mb_substr($request->input('title'), 0, 30));
        $status = $request->input('status');
        $request['status'] = !empty($status) && $status == 'on' ? 1 : 0;
        $validator = $this->validator($request->all());
        $request['photo'] = $this->imageImplode($request);
        try {
            $validator->validate();
            $item = News::create($request->all());
            $result = 'success';
            $description = "Новость добавлена";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при добавлении новости";
        }
        return array("status" => $result, "desc" => $description);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $news = News::getNewsBySlug($slug);
        return view('main-template.news.show', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $news = News::getOnceNews($id);
        $news = Gallery::getImagePath($news);
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, News $news)
    {
        $status = $request->input('status');
        $request['status'] = !empty($status) && $status == 'on' ? 1 : 0;
        $validator = $this->validator($request->except('slug'));
        $request['photo'] = $this->imageImplode($request);
        try {
            $validator->validate();
            $news->update($request->except('slug'));
            $result = 'success';
            $description = "Новость изменена";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при изменении новости";
        }

        return array("status" => $result, "desc" => $description, "item" => $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string[]
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            News::where('id', $id)->delete();
            $result = 'success';
            $description = "Новость удалена";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при удалении новости";
        }

        return array("status" => $result, "desc" => $description);
    }

    private function validator($data) {
        return Validator::make($data, [
            'title' => ['required', 'max:255'],
            'slug' => ['unique:news'],
            'description' => ['max:5000'],
            'photo' => ['max:1000'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'meta_keywords' => ['max:255']
        ]);
    }

    private function imageImplode(Request$request) {
        $images = $request->input('photo');
        $images = $this->removeImgDomainFromPath($images);
        return !empty($images) ? implode(',', $images) : NULL;
    }

    private function removeImgDomainFromPath($images) {
        $PORTAL_URL = config('app.img_portal').'/';
        if(!empty($images)) {
            foreach ($images as &$img) {
                $img = str_replace($PORTAL_URL, "", $img);
            }
        }
        return $images;
    }
}
