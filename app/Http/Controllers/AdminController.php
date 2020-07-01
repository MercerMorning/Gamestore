<?php

namespace App\Http\Controllers;

use App\Addresses;
use App\Categories;
use App\Goods;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\GoodsRequest;
use App\Http\Requests\NotifyaddressRequest;
use App\Notifyaddress;
use App\Notifyaddresses;
use App\Orders;
use App\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private \Illuminate\Contracts\View\Factory $viewFactory;
    public function __construct(\Illuminate\Contracts\View\Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }
    public function index()
    {
        $addresses = Notifyaddress::all();
        $goods = Goods::all();
        $categories = Categories::all();
        $orders = Orders::all();
        return $this->viewFactory->make('admin.page', ['addresses' => $addresses,'goods' => $goods, 'categories' => $categories, 'users' => $categories, 'orders' => $orders]);
    }
}
