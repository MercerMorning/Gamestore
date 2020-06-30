<?php

namespace App\Http\Controllers;


use App\Categories;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function save(CategoriesRequest $request)
    {
        $categories = Categories::query()->find($request->id);

        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
        return redirect()->route('goods.admin');
    }

    public function add(CategoriesRequest $request)
    {
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
        return redirect()->route('goods.admin');
    }

    public function delete(Request $request)
    {
        Categories::destroy($request->id);
        return redirect()->route('goods.admin');
    }

    public function edit(Categories $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function create()
    {
        return view('categories.create');
    }
}