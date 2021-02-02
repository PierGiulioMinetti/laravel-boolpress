@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        YOUR POSTS
    </h1>
    @if ($posts->isEmpty( ))
        <p>
            No post has been created yet.
        </p>
    @else
        {{-- POSTS TABLE --}}
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>Created</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        {{$post->id}}
                        {{$post->title}}
                        {{$post->created_at->format('d/m/y')}}
                    </td>
                </tr>
                <td>
                    <a href="" class="btn btn-success">Show</a>
                </td>
                <td>
                    <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            @endforeach
        </tbody>
    @endif
</div>
@endsection