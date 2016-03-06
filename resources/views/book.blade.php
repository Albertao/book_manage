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
                        please input your book's information
                    </div>
                    <div class="panel-body">
                        @if(Session::has('error'))
                            {{Session::get('error')}}
                        @endif
                        <div class="form-group">
                            <label for="name">book name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="describe">book description:</label>
                            <textarea name="description" class="form-control" id="describe" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection