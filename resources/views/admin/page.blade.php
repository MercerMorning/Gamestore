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
@endsection