<?php

namespace App\Http\Controllers;

use App\Models\Book;

use App\Http\Requests;
use App\Models\Remark;
use Auth,Request;

class remarkController extends Controller
{
    //
    public function show(){
        $remarks = Remark::paginate(10);
        return view('remark')->with('remarks', $remarks);
    }

    public function remark(){
        if(Auth::check()){
            $model = new Remark();
            $model->user_id = Auth::user()->id;
            $model->content = Request::get('content');
            if($model->save()){
                return redirect()->back()->with(['success' => '留言成功']);
            }else{
                return redirect()->back()->with(['error' => '留言失败，请稍后再试']);
            }
        }else{
            return redirect()->back()->with(['error' => '您还未登录']);
        }
    }
}
