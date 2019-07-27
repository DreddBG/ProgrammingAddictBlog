@extends('layouts.app')

@section('content')
    <h1>This is React View</h1>
    <div id="reactapp"></div>
    <script src="{{ mix('js/app.js') }}"></script>

@endsection