@extends('layouts.app')

@section('content')
    <h2 class="text-center">Users</h2>
    @if(count($users) > 0)
            <div class="row">
                    <table class="table table-striped">
                        <tr>
                            <th>Post title</th>
                            <th class=" text-center">Edit</th>
                            <th class=" text-center">Delete</th>
                        </tr>
                    @foreach($users as $user)
                        <tr>
                            <th>
                                <h2><a href="/profile/{{$user->id}}">{{$user->id}} ID {{$user->name}} </a></h2>
                                <small>Created on {{$user->created_at}}</small>
                            </th>
                            <th class=" text-center">
                                <a href="">Edit</a>
                            </th>
                            <th class=" text-center">
                                <a href="">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="row">
                <div class="col" name="Links">
                    {{-- {{$user->links()}} --}}
                </div>
            </div>
    @else
        <p class="text-center">No posts found</p>
    @endif
@endsection