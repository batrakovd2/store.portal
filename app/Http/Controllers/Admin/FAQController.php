<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $faqs = FAQ::getFAQs(10);
        return view('admin.faq.index', compact('faqs', $faqs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        $status = $request->input('status');
        $request['status'] = !empty($status) && $status == 'on' ? 1 : 0;
        $validator = $this->validator($request->all());
        try {
            $validator->validate();
            $item = FAQ::create($request->all());
            $result = 'success';
            $description = "Вопрос добавлен";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при добавлении вопроса";
        }
        return array("status" => $result, "desc" => $description);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $faq = FAQ::getFAQ($id);
        return view('admin.faq.edit', compact('faq', $faq));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, FAQ $faq)
    {
        $status = $request->input('status');
        $request['status'] = !empty($status) && $status == 'on' ? 1 : 0;
        $validator = $this->validator($request->all());
        try {
            $validator->validate();
            $faq->update($request->all());
            $result = 'success';
            $description = "Вопрос изменен";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при изменении вопроса";
        }

        return array("status" => $result, "desc" => $description, "item" => $faq);
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
            FAQ::where('id', $id)->delete();
            $result = 'success';
            $description = "Вопрос удален";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при удалении вопроса";
        }

        return array("status" => $result, "desc" => $description);
    }

    private function validator($data) {
        return Validator::make($data, [
            'question' => ['required', 'max:5000'],
            'answer' => ['max:5000']
        ]);
    }
}
