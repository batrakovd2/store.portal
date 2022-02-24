<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $reviews = Review::getReviews(20);
        return view('admin.review.index', [
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $review = Review::getReview($id);
        return view('admin.review.edit', [
            'review' => $review
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, Review $review)
    {
        $status = $request->input('status');
        $request['status'] = !empty($status) && $status == 'on' ? 1 : 0;
        $delivery = $request->input('delivery');
        $request['delivery'] = !empty($delivery) && $delivery == 'on' ? 1 : 0;
        $price = $request->input('price');
        $request['price'] = !empty($price) && $price == 'on' ? 1 : 0;
        $quality = $request->input('quality');
        $request['quality'] = !empty($quality[0]) ? $quality[0] : 0;
        $rating = $request->input('rating');
        $request['rating'] = !empty($rating[0]) ? $rating[0] : 0;
        $validator = $this->validator($request->all());
        try {
            $validator->validate();
            $review->update($request->all());
            $result = 'success';
            $description = "Отзыв изменен";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при изменении отзыва";
        }

        return array("status" => $result, "desc" => $description);
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
            Review::where('id', $id)->delete();
            $result = 'success';
            $description = "Отзыв удален";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при удалении отзыва";
        }

        return array("status" => $result, "desc" => $description);
    }

    private function validator($data) {
        return Validator::make($data, [
            'name' => ['required', 'max:255'],
            'description' => ['required','max:5000']
        ]);
    }
}
