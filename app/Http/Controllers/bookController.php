<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth,Input;
use App\Models\Book;

class bookController extends Controller
{
    //
    public function show(){
        return view('book');
    }

    public function book($id){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $model = Book::findOrFail($id);
            $model->booked_user_id = $user_id;
            if($model->save()){
                return redirect()->back()->with(['success' => 'book succeed']);
            }else{
                return redirect()->back()->with(['error' => 'book failed,please try again']);
            }
        }else{
            return redirect()->back()->with(['error' => 'you haven\'t login']);
        }
    }

    public function provide(){
        if(true){//Auth::check()){
            $model = new Book();
            $model->user_id = 1;//Auth::user()->id;
            $model->name = Input::get('name');
            $model->description = Input::get('description');
            $model->is_booked = 0;
            if($model->save()){
                return redirect()->back()->with(['success' => 'book succeed']);
            }else{
                return redirect()->back()->with(['error' => 'book failed,please try again']);
            }
        }else{
            return redirect()->back()->with(['error' => 'you haven\'t login']);
        }
    }


}
