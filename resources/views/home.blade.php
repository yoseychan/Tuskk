@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <articles></articles>
        </div>
        @auth
            <p>from here is the content that is only visible to authorized users</p>
        @endauth
    </div>
@endsection
