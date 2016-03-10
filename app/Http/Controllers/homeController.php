<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Models\Book;

class homeController extends Controller
{
    //
    public function index(){
        $books = Book::where('is_booked', 0)->paginate(10);
        return view('index')->with(['books' => $books]);
    }

    public function search(){
        $kw = Request::get('name');
        $books = Book::where('name', 'like', '%'.$kw.'%')->paginate(20);
        return view('index')->with(['books' => $books]);
    }
}
