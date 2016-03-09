@extends('layouts.app')
@extends('modal')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>在此留下您的意见以便让我们做的更好</h1><br>
            <a href="" class="btn btn-primary">了解更多</a>
            <a href="{{ URL::route('bookPage') }}" class="btn btn-success" title="提供书籍走这边">提供书籍</a>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#remark-modal">留言</button>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            @if(Session::has('success'))
                <div style="padding: 15px;" class="bg-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('error'))
                <div style="padding: 15px;" class="bg-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="list-group">
                @foreach($remarks as $remark)
                    <div class="list-group-item col-xs-12">
                        <div class="col-xs-12">
                            <h4>{{$remark->user->name}}</h4>
                            <p>{{$remark->content}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $remarks->render() !!}
        </div>
    </div>
@endsection

@section('modal-title')
    请在此输入留言
@endsection

@section('modal-content')
    <form action="{{ URL::route('remark') }}" id="remark" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="content" name="content" placeholder="请在此输入您的留言">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection