<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Nette\Utils\Random;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.gallery.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string[]
     */
    public function store(Request $request)
    {
        $path = $request->input('path');
        try {
            if($path) {
                Gallery::create($request->all());
                $status = "success";
                $desc = "Файл добавлен";
            } else {
                $status = "error";
                $desc = "Ошибка при добавлении файла";
            }
        } catch (\Exception $e) {
            $status = "error";
            $desc = "Ошибка при добавлении файла";
        }

        return array("status" => $status, "desc" => $desc);

    }

    public function getHash() {
        $crypt = '';
        try{
            $randstr = Random::generate(5, 'A-Z');
            $key = "|JCQr!1QNy2EST3";
            $crypt = Crypt::encrypt($randstr.$key);
            $status = "success";
        } catch (\Exception $e) {
            $status = "error";
        }

        return array("status" => $status, "crypt" => $crypt);
    }

}
