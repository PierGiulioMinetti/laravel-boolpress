@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            CREATE NEW POST
        </h1>

        <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        @method('POST')
        
        <div class="form-group">
            <label for="title">Post body</label>
            <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="body">Post title</label>
            <textarea class="form-control" type="text" name="body" id="body" cols="30" rows="10">
                {{old('body')}}
            </textarea>
        </div>

        <input class="btn btn-primary" type="submit" value="Create Post">
        </form>
    </div>
</div>
@endsection