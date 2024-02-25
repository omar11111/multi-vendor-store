<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $parents  = Category::all();
        $category = new Category();
        return view('dashboard.categories.create', compact('category', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->post('name'))]);
        $status = $request->post('status') ? 'active' : 'inactive';
        $request->merge(['status' => $status]);
        $data = $request->except('image');

        $data['image'] = $this->uploadFile($request);
        Category::create($data);
        return Redirect::route('dashboard.categories.index')->with('success', 'Category Created');
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

     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents  = Category::where('id', '<>', $id)
            ->where(function ($query) use ($id) {
                $query->whereNull('parent_id')
                    ->orWhere('parent_id', '<>', $id);
            })
            ->get();
        return view('dashboard.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $oldImage = $category->image;
        $status = $request->post('status') ? 'active' : 'inactive';
        $request->merge(['status' => $status]);
        $data = $request->except('image');

        $data['image'] = $this->uploadFile($request);

        $category->update($data);

        if ($oldImage && $data['image']) {
            Storage::disk('public')->delete($oldImage);
        }

        return Redirect::route('dashboard.categories.index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        return Redirect::route('dashboard.categories.index')->with('success', 'Category Deleted');
    }

    protected function uploadFile($request)
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $file = $request->file('image');
        $path = $file->store('uploads', ['disk' => 'public']);
        return $path;
    }
}
