<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductChange extends Model
{
    use HasFactory;

    /*
     * change_type
     * 1 - product changed
     * 2 - product created
     * 3 - product deleted
     *
     * status
     * 0 - changes not yet made to the portal
     * 1 - changes made to the portal
     */

    protected $fillable = ["product_id", "change_type", "status"];

    public function productChanged($id) {
        if($id) {
            $data = [
                "product_id" => $id,
                "change_type" => 1,
                "status" => 0
            ];
            $item = ProductChange::where("product_id", $id)->first();
            if(!$item) {
                ProductChange::create($data);
            }
        }
    }

    public function productCreated($id) {
        if($id) {
            $data = [
                "product_id" => $id,
                "change_type" => 2,
                "status" => 0
            ];
            ProductChange::create($data);
        }
    }

    public function productDeleted($id) {
        if($id) {
            $data = [
                "product_id" => $id,
                "change_type" => 3,
                "status" => 0
            ];
            $item = ProductChange::where("product_id", $id)->first();
            $item ? $item->update($data) :  ProductChange::create($data);
        }
    }

    public function deleteItem($id) {
        $item = ProductChange::find($id);
        if($item) {
            $item->delete();
        }
    }



}
