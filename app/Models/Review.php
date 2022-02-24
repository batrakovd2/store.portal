<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'description', 'delivery', 'quality', 'price', 'view', 'rating', 'prod_id', 'status'];

    public function getReviews($limit = 20) {
        $reviews = Review::orderBy('created_at', 'desc')->paginate($limit);
        $reviews = Review::getStatus($reviews);
        return $reviews;
    }

    public function getReview($id) {
        return Review::find($id);
    }

    public function getStatus($reviews) {
        if($reviews) {
            foreach ($reviews as &$rv){
                if($rv->status == 0) {
                    $rv->status = "На модерации";
                }
                if($rv->status == 1) {
                    $rv->status = "Опубликовано";
                }
            }
            return $reviews;
        }
    }
}
