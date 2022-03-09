<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
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
            'rubricChild' => $rubricChild,
            'products' => Product::getAllProducts(5)
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
        $request['photo'] = $this->imageImplode($request);
        try {
            $validator->validate();
            $item = Product::create($request->all());
            $result = 'success';
            $description = "Товар добавлен";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при добавлении товара";
        }

        return array("status" => $result, "desc" => $description, "item" => $item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $product = Product::getProductBySlug($slug);
        if(!empty($product)) {
            $category = $product->category;
            return view('main-template.product.show', [
                'product' => $product,
                'category' => $category
            ]);
        } else {
            abort(404);
        }
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
        $product = Gallery::getImagePath($product);
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
            'rubric' => $rubric,
            'products' => Product::getAllProducts(5)
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
        $request['photo'] = $this->imageImplode($request);
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

        return array("status" => $result, "desc" => $description, "item" => $prod);
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

    private function imageImplode(Request$request) {
        $images = $request->input('photo');
        $images = $this->removeImgDomainFromPath($images);
        return !empty($images) ? implode(',', $images) : NULL;
    }

    private function removeImgDomainFromPath($images) {
        $PORTAL_URL = config('app.img_portal').'/';
        if(!empty($images)) {
            foreach ($images as &$img) {
                $img = str_replace($PORTAL_URL, "", $img);
            }
        }
        return $images;
    }
}
