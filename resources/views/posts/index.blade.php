@extends('layouts.app')

@section('content')
    <h2 class="text-center">Posts</h2>
    @if(count($posts) > 0)
            <div class="row">
                <div class="mx-auto">
                    <div class="text-center">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="card float-left mx-auto mb-4 text-center" style="width: 20rem;">
                                    <img class="img-fluid rounded" src="/storage/cover_images/noimage.png" alt="No image here to see.">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="/posts/{{$post->id}}">{!! Str::limit($post->title, 15, ' ...') !!}</a></h5>
                                        {{-- <p class="card-text">{{$post->body}}</p> --}}
                                        <small>Created at {{$post->created_at}} </small>
                                        <p><small>by <strong>{{$post->user->name}}</strong></small></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col" name="Links">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
    @else
        <p class="text-center">No posts found</p>
    @endif
@endsection