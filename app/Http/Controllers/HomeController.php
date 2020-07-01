<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;

class HomeController extends Controller
{
    private \Illuminate\Contracts\View\Factory $viewFactory;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\Illuminate\Contracts\View\Factory $viewFactory)
    {
        $this->middleware('auth');
        $this->viewFactory = $viewFactory;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::all();
        $categories = Categories::all();
        return $this->viewFactory->make('welcome', ['goods' => $goods, 'categories' => $categories]);
    }
}
