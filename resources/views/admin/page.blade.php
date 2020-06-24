@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <a href="{{route('goods.create')}}">добавить</a>

                    <div class="panel-heading">Goods</div>
                    <table class="table table-bordered">
                        @foreach($goods as $good)
                            <tr>
                                <td>{{$good->id}}</td>
                                <td>{{$good->name}}</td>
                                <td>{{$good->price}}</td>
                                <td>
                                    <a href="{{route('goods.edit', ['id' => $good->id])}}">edit</a>
                                    <a href="{{route('goods.delete', ['id' => $good->id])}}">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <a href="{{route('categories.create')}}">добавить</a>

                    <div class="panel-heading">Категории</div>
                    <table class="table table-bordered">
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->descr}}</td>
                                <td>
                                    <a href="{{route('categories.edit', ['id' => $category->id])}}">edit</a>
                                    <a href="{{route('categories.delete', ['id' => $category->id])}}">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h1>Orders</h1>
    <ul>
        @foreach($orders as $order)
            <li>
                {{ $order->user_email }}
                {{ $order->good_id }}
            </li>
        @endforeach
    </ul>
@endsection