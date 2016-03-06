<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Remark;
use Auth,Input;

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
            $model->content = Input::get('content');
            if($model->save()){
                return redirect()->back()->with(['success' => 'remark succeed']);
            }else{
                return redirect()->back()->with(['error' => 'remark failed,please try again']);
            }
        }else{
            return redirect()->back()->with(['error' => 'you haven\'t logined']);
        }
    }
}
