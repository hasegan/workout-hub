<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;


    public function __construct(
        Category $category
    ) {

        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->orderBy('created_at', 'DESC')->get();

        return view('category.listing')->with(compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = $this->category->saveCategory($request->all());

        return view('category.listingItem')->withCategory($category);
    }

    public function destroy($id)
    {
        $this->category->find($id)->delete();

        return back();
    }

    public function edit(Category $category)
    {
        return view('category.edit')->withCategory($category);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = $this->category->find($category->id);
        $category->update($request->all());

        return view('category.listingItem')->withCategory($category);
    }

    public function cancelEditCategory($id)
    {
        $category = $this->category->getItem($id);

        return view('category.listingItem')->withCategory($category);
    }
}
