<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use Auth,Mail,Request;
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
            if($model->user_id == $user_id){
                return redirect()->back()->with(['error' => '本人不能预定自己的书籍']);
            }
            if($model->booked_user_id == $user_id){
                return redirect()->back()->with(['error' => '您已经预定过该书籍了']);
            }
            $model->booked_user_id = $user_id;
            $model->is_booked = 1;
            if($model->save()){
                $email = $model->user->email;
                $flag = Mail::send('email', ['name' => $model->user->name, 'book_name' => $model->name, 'email' => Auth::user()->email, 'book_user_name' => Auth::user()->name, ], function($msg) use ($email){
                    $msg->to($email)->subject('your book has been booked');
                });
                if($flag){
                    return redirect()->back()->with(['success' => 'book succeed']);
                }else{
                    return redirect()->back()->with(['error' => 'mail send failed']);
                }
            }else{
                return redirect()->back()->with(['error' => 'book failed,please try again']);
            }
        }else{
            return redirect()->back()->with(['error' => 'you haven\'t login']);
        }
    }

    public function provide(){
        if(Auth::check()){
            $model = new Book();
            $model->user_id = Auth::user()->id;
            $model->name = Request::get('name');
            $model->description = Request::get('description');
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
