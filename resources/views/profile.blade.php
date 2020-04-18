@extends('layouts.app')

@section('content')

    <div class="container-xl main">
        <div class="spacer"></div>
        @auth
            <profile data-author="{{json_encode($author)}}" data-user="{{ json_encode(\Auth::user()) }}"></profile>
        @endauth
        @guest
            <profileguest data-author="{{json_encode($author)}}"></profileguest>
        @endguest
    </div>


@endsection
