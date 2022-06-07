<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoriesRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $title = 'Category edit';
        return view('admin.Categories.categories', ['title' => 'Admin category', 'categories' => $category->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Categories.categorycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
        $category->save();
        return redirect(route('categories.index'))->with(['success' => 'Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $title = 'Category edit';
        return view('admin.Categories.categoryedit', ['categories' => $category, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Category edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        $category->update($request->validated());
        $category->save();
        return redirect(route('categories.index'))->with(['success' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (count($category->news)) {
            dd($category->news);
            return redirect(route('categories.index'))->with(['alert' => "This category has news"]);
        }
        $category->deleteOrFail();
        return redirect(route('categories.index'))->with(['success' => "Delete"]);
    }
}
