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
    function index()
    {
        $addresses = Notifyaddress::all();
        $goods = Goods::all();
        $categories = Categories::all();
        $orders = Orders::all();
        $users = Users::all();
        return view('admin.page', ['addresses' => $addresses,'goods' => $goods, 'categories' => $categories, 'users' => $categories, 'orders' => $orders]);
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

    function changeAddress()
    {
        return view('addresses.edit', ['address' => 1]);
    }

    function saveAddress(NotifyaddressRequest $request)
    {
        $address = Notifyaddresses::query()->find($request->id);
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'MAIL_USERNAME=' . $address->name , 'MAIL_USERNAME=' . $request->name, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_PASSWORD=' . $address->name , 'MAIL_PASSWORD=' . $request->password, file_get_contents($path)
            ));
        }
        $address->name = $request->name;
        $address->password = $request->password;
        $address->save();
        return redirect()->route('goods.admin');
    }

}
