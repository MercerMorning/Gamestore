<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Notifyaddress;
use App\Orders;

class AdminController extends Controller
{
    private \Illuminate\Contracts\View\Factory $viewFactory;

    /**
     * AdminController constructor.
     * @param \Illuminate\Contracts\View\Factory $viewFactory
     */
    public function __construct(\Illuminate\Contracts\View\Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Страница администрарования
     */
    public function index()
    {
        $addresses = Notifyaddress::all();
        $goods = Goods::all();
        $categories = Categories::all();
        $orders = Orders::all();
        return $this->viewFactory->make('admin.page', ['addresses' => $addresses,'goods' => $goods, 'categories' => $categories, 'users' => $categories, 'orders' => $orders]);
    }
}
