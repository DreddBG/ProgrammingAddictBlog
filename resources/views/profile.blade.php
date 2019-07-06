@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Dashboard</div>
                    <br>
                    <div class="row mx-auto">
                        <div class="col-sm-auto">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <h2>{{$user->name}}</h2>
                                    <p><strong>About: </strong> Web Designer / UI. </p>
                                    <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
                                    <p><strong>Skills: </strong>
                                    <span class="tags">html5</span> 
                                    <span class="tags">css3</span>
                                    <span class="tags">jquery</span>
                                    <span class="tags">bootstrap3</span>
                                    </p>
                                </div>             
                                <div class="col-xs-auto col-sm-auto text-center">
                                    <figure>
                                        <img src="http://placehold.it/50x50" alt="" class="img-circle img-responsive">
                                    </figure>
                                </div>
                            </div>
                        </div>            
                    </div>
                    <br>
                    <h4 class="text-center">Your Blog Posts</h4>

                    
                    
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Post title</th>
                            <th>Edit</th>
                            <th class=" text-right">Delete</th>
                        </tr>
                        @foreach($posts as $post)
                           

                            <tr>
                                <th>
                                    <h2><a href="/posts/{{$post->id}}">{!! Str::limit($post->title, 25, ' ...') !!}</a></h2>
                                    <small>Posted on {{$post->created_at}} by <strong>{{$post->user->name}}</strong></small>
                                </th>
                                
                                <th>
                                    @if (!Auth::guest())
                                        @if (Auth::user()->name === $user->name)
                                            <a href="/posts/{{$post->id}}/edit">Edit</a>
                                        @endif
                                    @endif
                                </th>
                                <th>
                                    @if (!Auth::guest())
                                        @if (Auth::user()->name === $user->name)
                                            {!! Form::open(['action' => ['PostsContorller@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn - btn-danger'])}}
                                            {{ Form::close() }}
                                        @endif
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p class="text-center">No posts found</p>
                        <a href="/posts/create" class="btn btn-primary">Create Something</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
