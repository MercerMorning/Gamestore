<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('home');
        $goods = Goods::all();
        $categories = Categories::all();
        return view('welcome', ['goods' => $goods, 'categories' => $categories]);
    }
}
