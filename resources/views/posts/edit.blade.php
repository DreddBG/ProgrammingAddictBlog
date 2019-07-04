@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-sm">
                <h1>Create Post</h1>
            </div>
            <div class="col-sm float-right">
                <div class="col col-lg-5 ">
                    <p class="ml-md-3"><span class="fa fa-heart-o fa-lg "> 0</span></p>
                </div>
            </div>
        </div>
        <div class="form text-left">
            {{ Form::open(['action' => ['PostsContorller@update', $post->id], 'method' => 'POST']) }}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            <div class="row">
                <div class="col-md-auto">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>
                <div class="col-md-auto">
                    @if (!Auth::guest())
                        @if (Auth::user()->id == $post->user_id)
                            <div class="form ml-md-3">
                                {!! Form::open(['action' => ['PostsContorller@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn - btn-danger'])}}
                                {{ Form::close() }}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            {{ Form::close() }}
        </div>
    

@endsection