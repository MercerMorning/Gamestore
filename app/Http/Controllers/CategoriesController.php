<?php

namespace App\Http\Controllers;


use App\Categories;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    private \Illuminate\Routing\Redirector $redirector;
    private \Illuminate\Contracts\View\Factory $viewFactory;
    public function __construct(\Illuminate\Routing\Redirector $redirector, \Illuminate\Contracts\View\Factory $viewFactory)
    {
        $this->redirector = $redirector;
        $this->viewFactory = $viewFactory;
    }
    public function save(CategoriesRequest $request)
    {
        $categories = Categories::query()->find($request->id);

        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
        return $this->redirector->route('goods.admin');
    }

    public function add(CategoriesRequest $request)
    {
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
        return $this->redirector->route('goods.admin');
    }

    public function delete(Request $request)
    {
        Categories::destroy($request->id);
        return $this->redirector->route('goods.admin');
    }

    public function edit(Categories $category)
    {
        return $this->viewFactory->make('categories.edit', ['category' => $category]);
    }

    public function create()
    {
        return $this->viewFactory->make('categories.create');
    }
}