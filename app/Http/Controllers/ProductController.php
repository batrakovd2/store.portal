<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::getAllProducts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $prt = new PortalConnectionController();
        $fields = $prt->getFields();
        $units = $prt->getUnits();
        return view('admin.product.create', [
            'categories' => Category::getAllParentCategories(),
            'fields' => $fields,
            'units' => $units
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

        $validator = $this->validator($request->all());

        $request['slug'] = Str::slug(mb_substr($request->input('title'), 0, 30));
        $fields = $request->input('fields');
        $request['fields'] = $fields ? json_encode($fields) : NULL;
        try {
            $validator->validate();

            Product::create($request->all());
            $result = 'success';
            $description = "Товар добавлен";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при добавлении товара";
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
        $prt = new PortalConnectionController();
        $fields = $prt->getFields();
        $units = $prt->getUnits();
        $product = Product::getProduct($id);
        $checkedFields = $product && $product->fields ? json_decode($product->fields) : 0;
        $categoryId = $product ? $product->category_id : 0;
        $parentCategory = Category::getCategory($categoryId);
        $parentCategory = $parentCategory ? CategoryController::getCategoryChildChain($parentCategory->id) : 0;
        $categories = $parentCategory ? [] : Category::getAllParentCategories();
        return view('admin.product.edit', [
            'product' => $product,
            'parentCategory' => $parentCategory,
            'categories' => $categories,
            'fields' => $fields,
            'checkedFields' => $checkedFields,
            'units' => $units
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, Product $product)
    {
        $validator = $this->validator($request->except('slug'));
        $fields = $request->input('fields');
        $request['fields'] = $fields ? json_encode($fields) : NULL;
        try {
            $validator->validate();
            $prod = Product::find($product->id);
            $prod->update($request->except('slug'));
            $result = 'success';
            $description = "Товар добавлен";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при добавлении товара";
        }

        return array("status" => $result, "desc" => $description);
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

    public function getProductFields($id) {
        $prod = Product::getProductFields($id);
        $prod = $prod && $prod[0]->fields ? json_decode($prod[0]->fields) : [];
        return $prod;
    }

    private function validator($data) {
        return Validator::make($data, [
            'title' => ['required', 'max:15'],
            'up_text' => ['required', 'max:15'],
        ]);
    }
}
