<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSourceRequest;
use App\Http\Requests\Admin\UpdateSourceRequest;
use App\Models\Category;
use App\Models\Source;
use Inertia\Inertia;

class SourceController extends Controller
{
    public function index(Source $sources)
    {
        return Inertia::render('Admin/Source/Sources', ['sources' => $sources->with('category')->paginate(15)]);
    }

    public function create()
    {
        return Inertia::render('Admin/Source/SourceCreate', ['categories' => Category::all()]);
    }

    public function store(StoreSourceRequest $request, Source $source)
    {
        $validated = $request->validated();
        if(!$request->has('active')){
            $validated['active'] = 0;
        }
        $source->fill($validated);
        $source->save();
        return redirect(route('sources.index'))->with(['success'=>'Added']);
    }

    public function show(Source $source)
    {
        //
    }

    public function edit(Source $source)
    {
        return Inertia::render('Admin/Source/SourceEdit', ['source' => $source, 'categories' => Category::all()]);
    }

    public function update(UpdateSourceRequest $request, Source $source)
    {
        $validated = $request->validated();
        if(!$request->has('active')){
            $validated['active'] = 0;
        }
        $source->fill($validated);
        $source->save();
        return redirect(route('sources.index'))->with('success', 'Updated');
    }

    public function destroy(Source $source)
    {
        $source->delete();
        return redirect()->back()->with('success', 'Deleted');
    }
}
