@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>
    <div class="form text-left">
        {{ Form::open(['action' => 'PostsContorller@store', 'method' => 'POST', 'enctype' => 'multipart/data']) }}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="forum-group">
            {{Form::file('cover_image')}}
            <hr>
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {{ Form::close() }}
    </div>

@endsection