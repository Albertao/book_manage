@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>today,which book do u wanna exchange?</h1>
            <a href="" class="btn btn-primary">Learn more</a>
            <a href="{{ URL::route('bookPage') }}" class="btn btn-success">Provide book</a>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="list-group">
                @foreach($books as $book)
                <div class="list-group-item col-xs-12">
                    <div class="col-xs-8">
                        <h4>{{$book->name}}</h4>
                        <p>{{$book->description}}</p>
                    </div>
                    <div class="col-xs-4">
                        <a href="" class="btn btn-primary btn-block" style="margin-top: 15px;">Book</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection