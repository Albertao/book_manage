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
                $anotherEmail = Auth::user()->email;
                $toUser = Mail::send('email', ['name' => $model->user->name, 'book_name' => $model->name, 'email' => Auth::user()->email, 'book_user_name' => Auth::user()->name, ], function($msg) use ($email){
                    $msg->to($email)->subject('您发布交换的书籍已被确认');
                });
                $toBookedUser = Mail::send('email2', ['name' => Auth::user()->name, 'book_name' => $model->name, 'email' => $email], function($msg) use($anotherEmail) {
                    $msg->to($anotherEmail)->subject('您的预定已经确认');
                });
                if($toBookedUser && $toUser){
                    return redirect()->back()->with(['success' => 'book success']);
                }else{
                    return redirect()->back()->with(['error' => '邮件发送失败，请稍后再试']);
                }
            }else{
                return redirect()->back()->with(['error' => '预定失败，请稍后再试']);
            }
        }else{
            return redirect()->back()->with(['error' => '您尚未登录']);
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
                return redirect()->back()->with(['success' => '发布成功']);
            }else{
                return redirect()->back()->with(['error' => '发布失败，请稍后再试']);
            }
        }else{
            return redirect()->back()->with(['error' => '您尚未登录']);
        }
    }


}
