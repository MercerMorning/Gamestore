<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Http\Requests\GoodsRequest;
use App\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $goods = Goods::all();
        $categories = Categories::all();
        $users = Users::all();
        return view('admin.page', ['goods' => $goods, 'categories' => $categories, 'users' => $categories]);
    }

    function create()
    {
        return view('goods.create');
    }

    function edit(Goods $good)
    {
        return view('goods.edit', ['good' => $good]);
    }

    function add(GoodsRequest $request)
    {
        $goods = new Goods();
        $goods->name = $request->name;
        $goods->price = $request->price;
        $goods->category = $request->category;
        $goods->descr = $request->descr;
        $goods->photo = $request->photo;
        $goods->save();
        return redirect()->route('goods.admin');
    }


    function save(GoodsRequest $request)
    {
        $goods = Goods::query()->find($request->id);

        $goods->name = $request->name;
        $goods->price = $request->price;
        $goods->category = $request->category;
        $goods->descr = $request->descr;
        $goods->photo = $request->photo;
        $goods->save();
        return redirect()->route('goods.admin');
    }

    function delete(Request $request)
    {
        Goods::destroy($request->id);
        return redirect()->route('goods.admin');
    }
}
