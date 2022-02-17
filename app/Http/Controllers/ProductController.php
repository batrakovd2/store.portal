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
        $request = new Request();
        $request['id'] = 0;
        $rubricChild = $prt->getRubricChild($request);
        return view('admin.product.create', [
            'categories' => Category::getAllParentCategories(),
            'fields' => $fields,
            'units' => $units,
            'rubricChild' => $rubricChild
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
        $request = new Request();
        $request['id'] = $product && $product->rubric_id ? $product->rubric_id : 0;
        $rubricChild = $prt->getRubricChild($request);
        $rubric = $product->rubric_id ? $prt->getRubric($product->rubric_id) : [];
        $rubric = $rubric ? $prt->getRubricChildChain($product->rubric_id) : [];
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
            'units' => $units,
            'rubricChild' => $rubricChild,
            'rubric' => $rubric
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
     * @return string[]
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            Product::where('id', $id)->delete();
            $result = 'success';
            $description = "Товар удален";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при удалении товара";
        }

        return array("status" => $result, "desc" => $description);
    }

    public function getProductFields($id) {
        $prod = Product::getProductFields($id);
        $prod = $prod && $prod[0]->fields ? json_decode($prod[0]->fields) : [];
        return $prod;
    }

    private function validator($data) {
        return Validator::make($data, [
            'title' => ['required', 'max:255'],
            'up_text' => ['max:300'],
            'price' => ['max:100'],
            'photo' => ['max:255'],
            'stock' => ['max:255'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'meta_keywords' => ['max:255'],
            'prod_id' => ['digits_between:0,11'],
            'category_id' => ['digits_between:0,11'],
            'rubric_id' => ['digits_between:0,11'],
            'units' => ['digits_between:0,11'],
            'view' => ['digits_between:0,11'],
            'priority' => ['digits_between:0,11'],
            'rating' => ['digits_between:0,11']
        ]);
    }
}
