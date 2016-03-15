<?php

namespace App\Http\Controllers;

use Request, Auth;

use App\Http\Requests;
use App\Models\Book;

class bookManageController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function show(){
        $books = Auth::user()->books;
        return view('my')->with(['books' => $books]);
    }

    public function delete($id){
        $user_id = Auth::user()->id;
        $model = Book::where('user_id', $user_id)->find($id);
        if($model){
            $model->delete();
            return redirect()->back()->with(['success' => '取消托管成功']);
        }else{
            return redirect()->back()->with(['error' => '找不到该本书，请稍后再试']);
        }
    }
}
