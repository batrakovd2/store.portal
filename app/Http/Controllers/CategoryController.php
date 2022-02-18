<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Faker\Provider\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $category = Category::getCategories();
        return view('admin.category.index', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.category.create',[
            'categories' => Category::getAllParentCategories()
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
        $request['slug'] = Str::slug(mb_substr($request->input('title'), 0, 30));
        try {
            Category::create($request->all());
            $result = 'success';
            $description = "Категория добавлена";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при добавлении категории";
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
        $category = Category::getCategory($id);
        $parentCategory = $category->parent_id ? Category::getCategory($category->parent_id) : 0;
        $parentCategory = $parentCategory ? $this->getCategoryChildChain($parentCategory->id) : 0;
        $categories = $parentCategory ? [] : Category::getAllParentCategories();
        return view('admin.category.edit', [
            'category' => $category,
            'parentCategory' => $parentCategory,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string[]
     */
    public function update(Request $request, Category $category)
    {
        try {
            $category = Category::find($category->id);
            $category->update($request->except('slug'));
            $result = 'success';
            $description = "Категория изменена";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при изменении категории";
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
            Category::where('id', $id)->delete();
            $result = 'success';
            $description = "Категория удалена";
        } catch (\Exception $e) {
            $result = 'error';
            $description = "Произошла ошибка при удалении категории";
        }

        return array("status" => $result, "desc" => $description);
    }

    public static function getCategoryChildChain($id, $chain_ch = []) {
        if($id) {
            $chain = Category::where('id', $id)->select('id', 'title', 'parent_id')->first();
            if($chain) {
                $chain = $chain->toArray();
                array_unshift($chain_ch, [
                    'parent_id' => $chain['parent_id'],
                    'title' => $chain['title'],
//                'url' => $chain['url'],
                    'id' => $id
                ]);
            }
            if(!empty($chain['parent_id'])) {
                return self::getCategoryChildChain($chain['parent_id'], $chain_ch);
            }
            return $chain_ch;
        }

    }

    public function getChildCategory(Request $request) {
        $id = $request->input('id');
        $id = $id ? $id : 0;
        $category = Category::where('parent_id', $id)->get();
        return $category;
    }
}
