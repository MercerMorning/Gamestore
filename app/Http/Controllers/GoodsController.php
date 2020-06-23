<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Mail\BookEdit;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    function index()
    {
        $goods = Goods::all();
        $categories = Categories::all();
        return view('welcome', ['goods' => $goods, 'categories' => $categories]);
    }

    function goodpage($id)
    {
        $categories = Categories::all();
        $good = Goods::query()->find($id);
        //\Mail::to(\Auth::user())->send(new BookEdit(['book'=>$good]));
        return view('goods.page', ['attributes' => $good, 'categories' => $categories]);
    }

    function categories($id)
    {
        $categories = Categories::all();
        $categoryName = Categories::query()->select('name')->where('id', '=', $id)->get();
        $goodList = Goods::query()->select()->where('category', '=', $categoryName[0]['name'])->get();
        return view('goods.list', ['goods' => $goodList, 'categories' => $categories, 'categoryName' => $categoryName[0]['name']]);
    }

    function order($id)
    {
        \Mail::to(\Auth::user())->send(new BookEdit(['goodId'=>$id, 'email' => \Auth::user()->email]));
        return 'success!';
    }
}
