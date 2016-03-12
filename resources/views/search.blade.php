@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>今天，你想换啥书呢？</h1><br>
            <a href="" class="btn btn-primary" title="了解更多走这边～">了解更多</a>
            <a href="{{ URL::route('bookPage') }}" class="btn btn-success" title="提供书籍走这边~">提供书籍</a>
            <a href="{{ URL::route('remarkPage') }}" class="btn btn-info" title="给我们留言走这边~">留言</a>
        </div>
    </div>
    <div class="container">
        <div class="row form-group">
            <form action="{{ URL::route('search') }}" method="post">
                <div class="col-xs-8">
                    <input type="text" class="form-control col-xs-6" placeholder="" name="name">
                </div>

                {{ csrf_field() }}
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="row">
            @if(count($books) == 0)
                <div style="padding: 15px;" class="bg-info">暂无搜索结果</div>
            @else
                <div class="list-group">
                @foreach($books as $book)
                    <div class="list-group-item col-xs-12">
                        <div class="col-xs-8">
                            <h4>{{$book->name}}</h4>
                            <p>{{$book->description}}</p>
                        </div>
                        <div class="col-xs-4">
                            <a href="{{ URL::route('book', $book->id) }}" class="btn btn-primary btn-block" style="margin-top: 15px;">预定</a>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection