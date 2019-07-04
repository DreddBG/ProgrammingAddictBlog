@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h2>{{$title}}</h2>
        <h1 class="display-4">Welcome to {{ config('app.name', 'Laravel') }}!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        
        @if (!Auth::guest())
            <h2>Hello <strong>{{ Auth::user()->name }}</strong></h2>
            <a class="btn btn-primary btn-lg" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        @else
            <p>
                <p>{{ session('status') }}</p>
                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
            </p>
        @endif
    </div>

@endsection