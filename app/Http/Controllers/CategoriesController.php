<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    private \Illuminate\Routing\Redirector $redirector;
    private \Illuminate\Contracts\View\Factory $viewFactory;

    /**
     * CategoriesController constructor.
     * @param \Illuminate\Routing\Redirector $redirector
     *
     * @param \Illuminate\Contracts\View\Factory $viewFactory
     */
    public function __construct(\Illuminate\Routing\Redirector $redirector, \Illuminate\Contracts\View\Factory $viewFactory)
    {
        $this->redirector = $redirector;
        $this->viewFactory = $viewFactory;
    }

    /**
     * @param CategoriesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(CategoriesRequest $request)
    {
        $categories = Categories::query()->find($request->id);

        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
        return $this->redirector->route('goods.admin');
    }

    /**
     * @param CategoriesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * Добавление категории
     */
    public function add(CategoriesRequest $request)
    {
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
        return $this->redirector->route('goods.admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * Удаление категории
     */
    public function delete(Request $request)
    {
        Categories::destroy($request->id);
        return $this->redirector->route('goods.admin');
    }

    /**
     * @param Categories $category
     *
     * @return \Illuminate\Contracts\View\View
     *
     * Изменение категории
     */
    public function edit(Categories $category)
    {
        return $this->viewFactory->make('categories.edit', ['category' => $category]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Создание категории
     */
    public function create()
    {
        return $this->viewFactory->make('categories.create');
    }
}