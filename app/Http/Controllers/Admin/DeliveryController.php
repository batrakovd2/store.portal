<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PortalConnectionController;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $deliveries = Delivery::getDeliveries();
        return view('admin.delivery.index', compact('deliveries', $deliveries));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $prt = new PortalConnectionController();
        $portaldelivery = $prt->getDeliveries();
        return view('admin.delivery.create', [
            'portaldelivery' => $portaldelivery
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

        $request['status'] = $request->input('status') == 'on' ? 1 : 0;
        $price = $request->input('price') ?? 0;
        $priceFree = $request->input('price_free') ?? 0;
        $request['price_info'] = json_encode(["price" => $price, "price_free" => $priceFree]);
        try {
            Delivery::create($request->all());
            $result = 'success';
            $description = "Вид доставки добавлен";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при добавлении доставки";
        }

        return array("status" => $result, "desc" => $description);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $prt = new PortalConnectionController();
        $portaldelivery = $prt->getDeliveries();
        $delivery = Delivery::getDelivery($id);
        return view('admin.delivery.edit', [
            'delivery' => $delivery,
            'portaldelivery' => $portaldelivery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
