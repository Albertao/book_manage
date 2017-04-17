<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Models\Book;

class homeController extends Controller
{
    //
    public function index(){
        $books = Book::where('is_booked', 0)->orderBy('created_at', 'desc')->paginate(10);
        return view('index')->with(['books' => $books]);
    }

    public function search(){
        $kw = Request::get('name');
        $books = Book::where('name', 'like', '%'.$kw.'%')->where('is_booked', 0)->get();
        return view('search')->with(['books' => $books]);
    }
}
