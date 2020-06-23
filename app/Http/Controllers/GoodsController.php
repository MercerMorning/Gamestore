<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    function index()
    {
        $goods = Goods::all();
        return view('goods.list', ['goods' => $goods]);
    }

    function goodpage($id)
    {
        $good = Goods::query()->find($id);
        return view('goods.page', ['attributes' => $good]);
    }
}
