@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ URL::route('provide') }}" method="post" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        请输入您要提供的书籍的信息
                    </div>
                    <div class="panel-body">
                        @if(Session::has('success'))
                            <div style="padding: 15px;" class="bg-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('error'))
                            <div style="padding: 15px;" class="bg-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="name">书名：</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="请在此输入你想提供的书的书名">
                        </div>
                        <div class="form-group">
                            <label for="describe">书籍描述：</label>
                            <textarea name="description" class="form-control" id="describe" cols="30" rows="10" placeholder="请在此输入您提供书的详细信息，并写明您想交换的书名"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
