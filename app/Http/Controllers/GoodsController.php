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
    public function index()
    {
        $goods = Goods::all();
        $categories = Categories::all();
        return view('welcome', ['goods' => $goods, 'categories' => $categories]);
    }

    public function create()
    {
        return view('goods.create');
    }

    public function edit(Goods $good)
    {
        return view('goods.edit', ['good' => $good]);
    }

    public function add(GoodsRequest $request)
    {
        $goods = new Goods();
        $goods->name = $request->name;
        $goods->price = $request->price;
        $goods->category = $request->category;
        $goods->descr = $request->descr;
        $goods->image = $request->file('photo')->store('uploads', 'public');
        $goods->save();
        return redirect()->route('goods.admin');
    }




    public function save(Request $request)
    {
        $goods = Goods::query()->find($request->id);
        $goods->name = $request->name;
        $goods->price = $request->price;
        $goods->category = $request->category;
        $goods->descr = $request->descr;
        $goods->image = $request->image;
        $goods->save();
        return redirect()->route('goods.admin');
    }



    public function delete(Request $request)
    {
        Goods::destroy($request->id);
        return redirect()->route('goods.admin');
    }

    public function goodpage($id)
    {
        $categories = Categories::all();
        $good = Goods::query()->find($id);
        //\Mail::to(\Auth::user())->send(new BookEdit(['book'=>$good]));
        return view('goods.page', ['attributes' => $good, 'categories' => $categories]);
    }

    public function categories($id)
    {
        $categories = Categories::all();
        $categoryName = Categories::query()->select('name')->where('id', '=', $id)->get();
        $goodList = Goods::query()->select()->where('category', '=', $categoryName[0]['name'])->get();
        return view('goods.list', ['goods' => $goodList, 'categories' => $categories, 'categoryName' => $categoryName[0]['name']]);
    }

    public function order($id)
    {
        $orders = new Orders();
        $orders->user_email = \Auth::user()->email;
        $orders->good_id = $id;
        $orders->save();
        \Mail::to(\Auth::user())->send(new BookEdit(['goodId'=>$id, 'email' => \Auth::user()->email]));
        $admins = [];
        foreach ($admins as $value) {
            \Mail::to(\Auth::user())->send(new BookEdit(['goodId'=>$id, 'email' => $value]));
        }
        return 'success!';
    }
}
