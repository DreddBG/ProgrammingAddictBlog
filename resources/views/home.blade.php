@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You are logged in!</p>
                </div>
                <h4 class="text-center">Your Blog Posts</h4>

                <table class="table table-striped">
                    <tr>
                        <th>Post title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <tr>
                            <th>
                                <h2><a href="/posts/{{$post->id}}">{!! Str::limit($post->title, 20, ' ...') !!}</a></h2>
                                <small>Posted on {{$post->created_at}} by <strong>{{$post->user->name}}</strong></small>
                            </th>
                            <th><a href="/posts/{{$post->id}}/edit">Edit</a></th>
                            <th>
                                {!! Form::open(['action' => ['PostsContorller@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn - btn-danger'])}}
                                {{ Form::close() }}
                            </th>
                        </tr>
                    @endforeach
                </table>
                @else
                    <p class="text-center">No posts found</p>
                @endif
                <a href="/posts/create" class="btn btn-primary">Create Something</a>
            </div>
        </div>
    </div>
</div>
@endsection
