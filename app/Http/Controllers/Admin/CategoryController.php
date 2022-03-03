<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(20);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validateData = $request->validate(
            [
            'name' => 'required',
            ]
        );

        $category = new Category();
        $category->fill($data);
        $category->slug = $category->createSlug($data['name']);
        $category->save();

        return redirect()->route('admin.categories.show', $category->slug);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.categories.edit', ['categories' => $categories]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $categoryValidate = $request->validate(
            [
                'name' => 'required',
            ]
        );

        $category->update();
        return redirect()->route('admin.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', "Category  $category->name deleted");
    }
}
