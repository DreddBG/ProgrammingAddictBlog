@extends('layouts.app')

@section('content')
    <div class="container pb-cmnt-container">
		<div class="row">
			<a class="btn btn-dark" href="/posts" role="button">Go Back</a>
		</div>
        <div class="row">
          	<!-- Post Content Column -->
          	<div class="col-lg-12">
    
				<!-- Title -->
				<h1 class="mt-4">{{$post->title}} <strong> with id {{$post->id}}</strong></h1>
		
				<!-- Author -->
				<p class="lead">
				by
				<a href="/profile/{{$post->user->id}}">{{$post->user->name}}</a>
				</p>
				<hr>
		
				<!-- Date/Time -->
				<p>Posted on {{$post->created_at}}</p>
				<hr>

				<!-- Preview Image -->
				<img class="img-fluid rounded" src="/storage/cover_images/noimage.png" alt="No image here to see.">
				<hr>
		
				<!-- Post Content -->
				{{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p> --}}
				<p>{!!$post->body!!}</p>
				<hr>
			</div>
		</div>	
			
		<div class="d-flex flex-row">
			<div class="p-2 col-sm-auto">
				<p class="ml-md-3 mx-auto"><span class="fa fa-heart-o fa-lg "> {{$post->likes_count}}</span></p>
			</div>
			<div class="p-2 col-sm-auto">
				@if (!Auth::guest())
					@if (Auth::user()->id == $post->user_id)
						<div class="row">
							<div class="col-sm-auto">
								<a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary btn-block mx-auto">Edit</a>  
							</div>
							<div class="col-sm-auto">
								<div class="form ml-md-3">
									{!! Form::open(['action' => ['PostsContorller@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
										{{Form::hidden('_method', 'DELETE')}}
										{{Form::submit('Delete', ['class' => 'btn - btn-danger'])}}
									{{ Form::close() }}
								</div>
							</div>
						</div>
					@endif
				@endif
			</div>	
		</div>
			
		<div class="row">
			@if (!Auth::guest())
			<!-- Comments Form -->
			<div class="container pb-cmnt-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-3">
						<div class="panel panel-info">
							<div class="panel-body">
								{{Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])}}
								{{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Write your comment here!', 'rows' => '3'])}}
								<form class="form-inline">
									<br>
									{{Form::submit('Submit', ['class' => 'btn btn-primary pull-right'])}}
									<div class="btn-group">
										<button class="btn" type="button"><span class="fa fa-picture-o fa-lg"></span></button>
										<button class="btn" type="button"><span class="fa fa-video-camera fa-lg"></span></button>
										<button class="btn" type="button"><span class="fa fa-microphone fa-lg"></span></button>
										<button class="btn" type="button"><span class="fa fa-music fa-lg"></span></button>
									</div>
								</form>
								{{ Form::close() }}
							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>
			@endif
		</div>
				
    
            <!-- Single Comment -->
		<div class="flex-row">
			@if(count($comments) > 0)
				@foreach($comments as $comment)
					@if ($post->id === $comment->post_id)
						<div class="row">
							<div class="media col-sm-auto">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="No image here to see.">
								<div class="media-body">
									<h5 class="mt-0"><a href="/profile/{{$post->user->id}}">{{$comment->name}}</a></a></h5>
									<p class="card-text">{{$comment->comment}}</p>
									<div class="row">
										<div class="col-sm-auto">
											<small>Created at {{$comment->created_at}} </small>
										</div>
										<div class="col-sm-auto">
											@if (!Auth::guest())
												@if (Auth::user()->name === $comment->name)
													{!! Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST']) !!}
														{{Form::hidden('_method', 'DELETE')}}
														<div class="row mx-auto">
															<div class="col-sm-auto">
																<a href="/comments/{{$comment->id}}/edit" class="btn btn-outline-primary btn-sm">Edit</a>  
															</div>
															<div class="col-sm-auto">
																{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
															</div>
														</div>
													{{ Form::close() }}
												@endif
											@endif
										</div>
									</div>
									<br>
								</div>
							</div>
						</div>
					@endif			
				@endforeach
			{{-- {{$comments->links()}} --}}
			@else
			<p class="text-center">No comments found</p>
			@endif
		</div>
@endsection