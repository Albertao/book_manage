<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Book;

class homeController extends Controller
{
    //
    public function index(){
        $books = Book::paginate(3);
        return view('index')->with(['books' => $books]);
    }
}
