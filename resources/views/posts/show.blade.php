@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <div class="container">
        <a class="btn btn-dark" href="/posts" role="button">Go Back</a>
        
        <div class="row">
          <!-- Post Content Column -->
          <div class="col-lg-12">
    
            <!-- Title -->
            <h1 class="mt-4">{{$post->title}} <strong> with id {{$post->id}}</strong></h1>
    
            <!-- Author -->
            <p class="lead">
              by
              <a href="#">{{$post->user->name}}</a>
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
			
			@if (!Auth::guest())
				<div class="row">
					<div class="col-md-auto">
						<p class="ml-md-3"><span class="fa fa-heart-o fa-lg "> 0</span></p>
					</div>
					<div class="col"></div>
				@if (Auth::user()->id == $post->user_id)
					<div class="col col-sm-4"></div>
						<div class="col col-lg-2">
							<div class="btn-group">
								<a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary btn-block">Edit</a>  
								<div class="form ml-md-3">
									{!! Form::open(['action' => ['PostsContorller@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
										{{Form::hidden('_method', 'DELETE')}}
										{{Form::submit('Delete', ['class' => 'btn - btn-danger'])}}
									{{ Form::close() }}
								</div>
							</div>
						</div>
					</div>
				@endif
				
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
    
            <!-- Single Comment -->
			@if(count($comments) > 0)
					<div class="row">
						<div class="col">
							@foreach($comments as $comment)
								@if ($post->id === $comment->post_id)
									<div class="row">
										<div class="media mb-8">
											<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="No image here to see.">
											<div class="media-body">
												<h5 class="mt-0">{{$comment->name}}</a></h5>
												<p class="card-text">{{$comment->comment}}</p>
												<div class="row">
													<div class="col-md-auto">
														<small>Created at {{$comment->created_at}} </small>
													</div>
													<div class="col"></div>
													<div class="col">
														<div class="form ml-md-3">
															@if (Auth::user()->name === $comment->name)
																{!! Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
																	{{Form::hidden('_method', 'DELETE')}}
																	{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
																{{ Form::close() }}
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>
              {{-- {{$comments->links()}} --}}
            @else
                <p class="text-center">No comments found</p>
			@endif
		</div>
	</div> 
            
@endsection