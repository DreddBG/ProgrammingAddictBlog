@extends('layouts.app')

@section('content')
    <h2 class="text-center">Users</h2>
    @if(count($users) > 0)
            <div class="row">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th class=" text-center">Edit</th>
                            <th class=" text-center">Delete</th>
                        </tr>
                    @foreach($users as $user)
                        <tr>
                            <th>{{$user->id}} ID</th>
                            <th>
                                <h2><a href="/profile/{{$user->id}}">{{$user->name}} </a></h2>
                                <small>Created on {{$user->created_at}}</small>
                            </th>
                            <th>
                                <p>{!! Str::limit($user->password, 10, '****') !!}</p>
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
                    {{$users->links()}}
                </div>
            </div>
    @else
        <p class="text-center">No posts found</p>
    @endif
@endsection