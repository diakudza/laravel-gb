<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoriesRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
        return Inertia::render('Admin/Categories/Categories', [
            'categories' => $category->paginate(15),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Categories/CategoryCreate');
    }

    public function store(StoreCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
        $category->save();
        return redirect(route('categories.index'))->with(['success' => 'Added']);
    }

    public function show()
    {

    }

    public function edit(Category $category)
    {
        return Inertia::render('Admin/Categories/CategoryEdit',['category' => $category]);
    }

    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        $category->update($request->validated());
        $category->save();
        return redirect(route('categories.index'))->with(['success' => 'Updated']);
    }

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
