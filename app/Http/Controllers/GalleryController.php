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
        //uploads/2022/03/622036f20d9ae.jpg
        $photo = Gallery::getPhoto(12);
        $photo = Gallery::getImagePathCollect($photo);
        return view('admin.gallery.index', [
            'photo' => $photo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string[]
     */
    public function store(Request $request)
    {
        $photo = $request->input('photo');
        try {
            if($photo) {
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

    public function getPhotos($count) {
        $photo = Gallery::getPhotos($count);
        $photo = Gallery::getImagePathCollect($photo);
        return $photo;
    }

}
