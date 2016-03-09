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
        <div class="row ">
            @if(Session::has('success'))
                <div style="padding: 15px;" class="bg-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('error'))
                <div style="padding: 15px;" class="bg-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="list-group">
                @foreach($books as $book)
                <div class="list-group-item col-xs-12">
                    <div class="col-xs-8">
                        <h4>{{$book->name}}</h4>
                        <p>{{$book->description}}</p>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ URL::route('book', $book->id) }}" class="btn btn-primary btn-block" style="margin-top: 15px;">Book</a>
                    </div>
                </div>
                @endforeach
            </div>
            {!! $books->render() !!}
        </div>
    </div>
@endsection