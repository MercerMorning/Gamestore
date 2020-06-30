<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\Mail\BookEdit;
use App\Mail\test;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as DebugBar;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()->orderBy('id', 'DESC')->get();
        return view('books.list', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function edit(Book $book)
    {
        //\Mail::to(\Auth::user())->send(new BookEdit(['book' => $book]));
        return view('books.edit', ['book' => $book]);
    }

    public function add(BookRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        return redirect()->route('books');
    }


    public function save(BookRequest $request)
    {
        $book = Book::query()->find($request->id);

        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        return redirect()->route('books');
    }

    public function delete(BookRequest $request)
    {
        Book::destroy($request->id);
        return redirect()->route('books');
    }
}
