<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\GoodsRequest;
use App\Orders;
use App\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    function index()
    {
        $goods = Goods::all();
        $categories = Categories::all();
        $orders = Orders::all();
        $users = Users::all();
        return view('admin.page', ['goods' => $goods, 'categories' => $categories, 'users' => $categories, 'orders' => $orders]);
    }

    function create()
    {
        return view('goods.create');
    }

    function categoryCreate()
    {
        return view('categories.create');
    }

    function edit(Goods $good)
    {
        return view('goods.edit', ['good' => $good]);
    }

    function categoryEdit(Categories $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    function add(GoodsRequest $request)
    {
        $goods = new Goods();
        $goods->name = $request->name;
        $goods->price = $request->price;
        $goods->category = $request->category;
        $goods->descr = $request->descr;
        //$goods->photo = $request->photo;
        $goods->photo = $request->file('photo')->store('uploads', 'public');
        $goods->save();
        return redirect()->route('goods.admin');
    }

    function categoryAdd(CategoriesRequest $request)
    {
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
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

    function categorySave(CategoriesRequest $request)
    {
        $categories = Categories::query()->find($request->id);

        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->save();
        return redirect()->route('goods.admin');
    }

    function delete(Request $request)
    {
        Goods::destroy($request->id);
        return redirect()->route('goods.admin');
    }

    function categoryDelete(Request $request)
    {
        Categories::destroy($request->id);
        return redirect()->route('goods.admin');
    }
}
