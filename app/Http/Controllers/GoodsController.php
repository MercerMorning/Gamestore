<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Http\Requests\GoodsRequest;
use App\Mail\BookEdit;
use App\Orders;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    private \Illuminate\Contracts\View\Factory $viewFactory;
    private \Illuminate\Routing\Redirector $redirector;

    /**
     * GoodsController constructor.
     * @param \Illuminate\Contracts\View\Factory $viewFactory
     *
     * @param \Illuminate\Routing\Redirector $redirector
     */
    public function __construct(\Illuminate\Contracts\View\Factory $viewFactory, \Illuminate\Routing\Redirector $redirector)
    {
        $this->viewFactory = $viewFactory;
        $this->redirector = $redirector;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Вывод всех товаров и категорий на странице
     */
    public function index()
    {
        $goods = Goods::all();
        $categories = Categories::all();
        return $this->viewFactory->make('welcome', ['goods' => $goods, 'categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Создание товара
     */
    public function create()
    {
        return $this->viewFactory->make('goods.create');
    }

    /**
     * @param Goods $good
     *
     * @return \Illuminate\Contracts\View\View
     *
     * Изменение товара
     */
    public function edit(Goods $good)
    {
        return $this->viewFactory->make('goods.edit', ['good' => $good]);
    }

    /**
     * @param GoodsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * Добавление товара
     */
    public function add(GoodsRequest $request)
    {
        $goods = new Goods();
        $goods->name = $request->name;
        $goods->price = $request->price;
        $goods->category = $request->category;
        $goods->descr = $request->descr;
        $goods->image = $request->file('photo')->store('uploads', 'public');
        $goods->save();
        return $this->redirector->route('goods.admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * Сохранение товара
     */
    public function save(Request $request)
    {
        $goods = Goods::query()->find($request->id);
        $goods->name = $request->name;
        $goods->price = $request->price;
        $goods->category = $request->category;
        $goods->descr = $request->descr;
        $goods->image = $request->image;
        $goods->save();
        return $this->redirector->route('goods.admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * Удаление товара
     */
    public function delete(Request $request)
    {
        Goods::destroy($request->id);
        return $this->redirector->route('goods.admin');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\View
     *
     * Вывод информации о товаре на индивидуальную страницу
     */
    public function single($id)
    {
        $categories = Categories::all();
        $good = Goods::query()->find($id);
        //\Mail::to(\Auth::user())->send(new BookEdit(['book'=>$good]));
        return $this->viewFactory->make('goods.page', ['attributes' => $good, 'categories' => $categories]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\View
     *
     * Вывод категорий на страницу
     */
    public function categories($id)
    {
        $categories = Categories::all();
        $categoryName = Categories::query()->select('name')->where('id', '=', $id)->get();
        $goodList = Goods::query()->select()->where('category', '=', $categoryName[0]['name'])->get();
        return $this->viewFactory->make('goods.list', ['goods' => $goodList, 'categories' => $categories, 'categoryName' => $categoryName[0]['name']]);
    }

    /**
     * @param $id
     *
     * @return string
     *
     * Осуществление заказа
     */
    public function order($id)
    {
        $orders = new Orders();
        $orders->userEmail = \Auth::user()->email;
        $orders->goodId = $id;
        $orders->save();
        \Mail::to(\Auth::user())->send(new BookEdit(['goodId'=>$id, 'email' => \Auth::user()->email]));
        $admins = [];
        foreach ($admins as $value) {
            \Mail::to(\Auth::user())->send(new BookEdit(['goodId'=>$id, 'email' => $value]));
        }
        return 'success!';
    }
}
