<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.page.index', [
            'pages' => Page::getPages()
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
        return view('admin.page.edit', [
            'page' => Page::getPage($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, Page $page)
    {
        $validator = $this->validator($request->all());
        try {
            $validator->validate();
            $page = Page::find($page->id);
            $page->update($request->except('files'));
            $result = 'success';
            $description = "Страница изменена";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при изменении страницы";
        }

        return array("status" => $result, "desc" => $description);
    }

    private function validator($data) {
        return Validator::make($data, [
            'title' => ['required', 'max:250'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'meta_keywords' => ['max:255'],
        ]);
    }



}
